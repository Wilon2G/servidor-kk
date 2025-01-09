<?php

require_once __DIR__."/../utils.php";
spl_autoload_register('classAutoLoader');
class Book{
private $isbn;
private $title;
private $author;
private $stock;
private $price;

public function __construct($isbn, $title, $author,$stock,$price ){
    $this->isbn=$isbn;
    $this->title=$title;
    $this->author=$author;
    $this->stock=$stock;
    $this->price=$price;

}

function __get($name){
    return $this->$name;
}

function addBook(){
    $conObj = new DBconnection();
    $con=$conObj->getConnect();
    $stmt = $con->prepare("INSERT INTO book (isbn, title,author,stock,price) VALUES (:isbn, :title, :author, :stock, :price)");
try {
    $stmt->execute(['isbn' => $this->isbn, 'title' => $this->title, 'author' => $this->author, 'stock' => $this->stock, 'price' => $this->price, ]);
    return "Book inserted correctly";
} catch (ErrorException $e) {
    return "Error inserting the book";
}
    
}

function rentBook($customerId){
    $conObj = new DBconnection();
    $con=$conObj->getConnect();

    $stmt = $con->prepare("INSERT INTO borrowed_books (book_id, customer_id,start,end) VALUES (:book_id, :customer_id, :start, :end)");
    $id=$this->getBookId($this->isbn);
try {
    $stmt->execute(['book_id' => $id, 'customer_id' => $customerId, 'start' => date('d-m-y'), 'end' => null, ]);
    return "Book rented correctly";
} catch (Error $e) {
    return "Error in database when renting book";
}

}

function getBookId($isbn){
    $conObj = new DBconnection();
    $con=$conObj->getConnect();

    $stmt = $con->prepare("SELECT id FROM book WHERE isbn = :isbn");
    $stmt->execute(['isbn' => $isbn]);
    $id = $stmt->fetch(PDO::FETCH_ASSOC);
    //var_dump($id);
    return $id["id"];
}


}
function showBooks(){
    $conObj = new DBconnection();
    $con=$conObj->getConnect();

    $books = $con->query("SELECT title,id,author FROM book")->fetchAll();

    //var_dump($books);
    foreach ($books as $book) {
        print("<form action=\"#\" method=\"POST\">
        <input type=\"submit\" name=\"chosenBook\" value=\"".$book["id"]."\"
        <div>
        ".
        $book["title"]
        .
        "
        </div>
        </input>
        <input type=\"hidden\" name=\"rentBook\"/>
        </form>
        ");
    }
}

function getBook($id){
    $conObj = new DBconnection();
    $con=$conObj->getConnect();

    $stmt = $con->prepare("SELECT * FROM book WHERE id = :id");
    $stmt->execute(['id' => $id]);
    $book=$stmt->fetch(PDO::FETCH_ASSOC);
    //var_dump($book);
    return $book;
}