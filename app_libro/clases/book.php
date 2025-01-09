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


}