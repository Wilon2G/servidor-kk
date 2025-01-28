<?php

namespace Daw2\AppLibroBlade;
use \PDO;
use PHPMailer\PHPMailer\PHPMailer;


class Customer{
private $id;
private $password;
private $email;
private $type;
private $firstName;
private $surname;

public function __construct($email, $password, $type,$firstName,$surname,$id=null ){
    $this->email=$email;
    $this->password=$password;
    $this->type=$type;
    $this->firstName=$firstName;
    $this->surname=$surname;
    $this->id=$id;
}

function __get($name){
    return $this->$name;
}


public static function fromId($id){
    $conObj = new DBconnection();
    $con=$conObj->getConnect();

    $stmt = $con->prepare("SELECT * FROM customer WHERE id = :id");
    $stmt->execute(['id' => $id]);
    $customer=$stmt->fetch(PDO::FETCH_ASSOC);

    return new self($customer["email"],$customer["password"],$customer["type"],$customer["firstname"],$customer["surname"],$customer["id"]);
}

function getRentedBooks(){
    $conObj = new DBconnection();
    $con=$conObj->getConnect();
    $stmt = $con->prepare("SELECT book_id FROM borrowed_books WHERE customer_id = :customer_id AND end IS NULL");
    $stmt->execute(['customer_id' => $this->id]);
    //var_dump($this->id);
    $rentedBooksId = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //var_dump($rentedBooksId);
    return $rentedBooksId;
}

function returnBook($bookId){
    $book = Book::fromId($bookId);
    $conObj = new DBconnection();
    $con=$conObj->getConnect();

    $oldestDate=$con->prepare("SELECT MIN(start) FROM borrowed_books WHERE book_id = :book_id AND customer_id = :customer_id AND end IS NULL");

    $oldestDate->execute([
        "book_id" => $bookId,
        "customer_id" => $this->id
    ]);

    $oldestBorrowedBook= $oldestDate->fetch();
    //var_dump($oldestBorrowedBook);

    $stmt = $con->prepare("
        UPDATE borrowed_books 
        SET end = :end 
        WHERE book_id = :book_id 
            AND customer_id= :customer_id 
            AND start = :start
    ");


    $stmt2 = $con->prepare("UPDATE book SET stock = :stock WHERE id = :book_id");

    $stmt2->execute(["stock" => ($book->stock +1), "book_id" => $bookId]);

    $result=$stmt->execute([
        "end" => date('y-m-d'),
        "book_id" => $bookId,
        "customer_id" => $this->id,
        "start" => $oldestBorrowedBook[0]
    ]);


    if ($result) {
        return "Book returned successfully";
    }
    else{
        return "There was an error in the return, please try again later or contact the developer";
    }
}


function buyBook($bookId,$price){
    $conObj = new DBconnection();
    $con=$conObj->getConnect();

    $saleStmt = $con->prepare("INSERT INTO sale (customer_id, date) VALUES (:customer_id, :date)");

    $date=date('d-m-y H:i:s');

    $sale=$saleStmt->execute(["customer_id"=>$this->id,"date"=>$date]);

    if ($sale) {
        $saleIdStmt=$con->prepare("SELECT id FROM sale WHERE customer_id = :customer_id AND date=:date");
        $saleIdStmt->execute(["customer_id"=>$this->id,"date"=>$date]);
        $saleId=$saleIdStmt->fetch(PDO::FETCH_ASSOC);
        if ($saleId) {
            $saleBookStmt = $con->prepare("INSERT INTO sale_book (book_id, sale_id,amount) VALUES (:book_id, :sale_id, :amount)");
            $saleBook=$saleBookStmt->execute(["book_id"=>$bookId,"sale_id"=>$saleId["id"],"amount"=>$price]);
            if ($saleBook) {
                $mail=new PHPMailer(true);
                $config = json_decode(file_get_contents(__DIR__.'\..\mailer.config.json'), true);
                $mail->isSMTP();
                $mail->Host="smtp.gmail.com";
                $mail->SMTPAuth=true;
                $mail->Username=$config["user"];
                $mail->Password=$config["password"];
                $mail->SMTPSecure=PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port=587;
                
                $body= file_get_contents(__DIR__.'\..\body.html');
                $mail->SetFrom('guilleleongordo@gmail.com', 'Digital BookShop');
                $mail->AddAddress($this->email, "Nombre completo");
                $mail->Subject = "Digital BookShop";
                $mail->AltBody = "Error in the message";
                $mail->MsgHTML($body);
                if(!$mail->Send()) {
                    
                    return "Transaction accomplished, but error in email: ".$mail->ErrorInfo;

                  } else {
                    return "Transaction accomplished, you will recive the bill in your email shortly";
                }
            }
            else {
                return "Error in sale Book";
            }
        }
        else {
            return "Error in sale Id";
        }
    }
    else{
        return "Error in sale";
    }
}


public static function getCustomer($id){
    $conObj = new DBconnection();
    $con=$conObj->getConnect();

    $stmt = $con->prepare("SELECT * FROM customer WHERE id = :id");
    $stmt->execute(['id' => $id]);
    $customer=$stmt->fetch(PDO::FETCH_ASSOC);
    //var_dump($book);
    return $customer;
}


function getBuyedBooks(){
    $conObj = new DBconnection();
    $con=$conObj->getConnect();
    $stmt = $con->prepare("SELECT id FROM sale WHERE customer_id = :customer_id");
    $stmt->execute(['customer_id' => $this->id]);
    $salesId = $stmt->fetchAll(PDO::FETCH_ASSOC);
    var_dump($salesId);
}


}




