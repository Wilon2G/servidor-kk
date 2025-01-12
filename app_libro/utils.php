<?php
session_start();
include_once "./clases/DBconnection.php";
function classAutoLoader($class)
{
    $class = strtolower($class);
    $classFile = $_SERVER['DOCUMENT_ROOT'] . '/servidor/app_libro/clases' . $class . '.php';
    if (is_file($classFile) && !class_exists($class))
        include $classFile;
}


function addCustomer($customer){
    $conObj = new DBconnection();
    $con=$conObj->getConnect();

    $cifPass=md5($customer->password);

    $stmt = $con->prepare("INSERT INTO customer (password, firstname,surname,email,type) VALUES (:password, :firstname, :surname, :username, :type)");

    $stmt->execute(['password' => $cifPass, 'firstname' => $customer->firstName, 'surname' => $customer->surname, 'username' => $customer->email, 'type' => $customer->type, ]);
    return true;
}

function checkCustomer2($username, $password) {
    // Crea una instancia de DBconnection
    $conObj = new DBconnection();
    $con=$conObj->getConnect();

    // Realiza la consulta usando 'query' para obtener todos los correos
    $users=$con->query("SELECT email FROM customer")->fetchAll(PDO::FETCH_COLUMN);
    if (in_array($username,$users)) {
        $stmt = $con->prepare("SELECT password FROM customer WHERE email = :email");
        $stmt->execute(['email' => $username]);
        $userPass = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($userPass["password"]===md5($password)) {
            echo("<p>Login successful");
            $stmt = $con->prepare("SELECT id FROM customer WHERE email = :email");
            $stmt->execute(['email' => $username]);
            $_SESSION["logedUser"]=$stmt->fetch(PDO::FETCH_ASSOC);
            header("location:./index.php");
            //var_dump($userPass);
            //var_dump($users);
        }
        else {
            echo("<p>Wrong password</p>");
        }
        
    }
    else {
        header("location:./register.php");
    }
    
    
}

// function getRentedBooks($userId){
//     $conObj = new DBconnection();
//     $con=$conObj->getConnect();
//     $stmt = $con->prepare("SELECT book_id FROM borrowed_books WHERE customer_id = :customer_id");
//     $stmt->execute(['customer_id' => $userId]);
    
//     $rentedBooks = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
//     return $rentedBooks;
// }



function checkCustomer($username, $password){
    $con=new DBconnection();
    $users=($con->getConnect()->query("select email from customer"));
    foreach ($users as $user) {
        var_dump($user);
    }
    
}