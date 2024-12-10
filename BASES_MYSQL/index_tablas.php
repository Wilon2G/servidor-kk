<?php



$con = new PDO('mysql:dbname=libro;host=127.0.0.1', "root", "");


$sql = "CREATE TABLE IF NOT EXISTS book (
    id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    isbn VARCHAR(13) NOT NULL,
    title VARCHAR(255) NOT NULL,
    author VARCHAR(255) NOT NULL,
    stock SMALLINT(5) NOT NULL,
    price FLOAT NOT NULL
  )";

$con->query($sql);


$sql = "CREATE TABLE IF NOT EXISTS customer (
  id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  firstname VARCHAR(255) NOT NULL,
  surname VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  type ENUM('basic','premium') NOT NULL
)";

$con->query($sql);

$sql = "CREATE TABLE IF NOT EXISTS borrowed_books (
  customer_id INT(10) UNSIGNED,
  book_id INT(10) UNSIGNED,
  start DATETIME,
  end DATETIME,
  INDEX (book_id),
  INDEX (customer_id),
  FOREIGN KEY (customer_id) REFERENCES customer(id),
  FOREIGN KEY (book_id) REFERENCES book(id)

)";

$con->query($sql);

$sql = "CREATE TABLE IF NOT EXISTS sale (
  id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  customer_id INT(10) UNSIGNED,
  date DATETIME,
  INDEX (customer_id),
  FOREIGN KEY (customer_id) REFERENCES customer(id)
)";

$con->query($sql);

$sql = "CREATE TABLE IF NOT EXISTS sale_book (
  sale_id INT(10) UNSIGNED,
  book_id INT(10) UNSIGNED,
  amount SMALLINT(5) NOT NULL,
  author VARCHAR(255) NOT NULL,
  INDEX (book_id),
  INDEX (sale_id),
  FOREIGN KEY (book_id) REFERENCES book(id),
  FOREIGN KEY (sale_id) REFERENCES sale(id)
)";

$con->query($sql);



// $sql = "CREATE TABLE IF NOT EXISTS sale_book (
//     book_id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     isbn VARCHAR(13) NOT NULL,
//     title VARCHAR(255) NOT NULL,
//     author VARCHAR(255) NOT NULL,
//     stock SMALLINT(5) NOT NULL,
//     price FLOAT NOT NULL
//   )";



// $sql="DROP TABLE book";
// $bookData->query($sql);



