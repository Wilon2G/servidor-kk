<?php

require_once __DIR__."/../utils.php";
spl_autoload_register('classAutoLoader');
class Customer{
private $password;
private $email;
private $type;
private $firstName;
private $surname;

public function __construct($email, $password, $type,$firstName,$surname ){
    $this->email=$email;
    $this->password=$password;
    $this->type=$type;
    $this->firstName=$firstName;
    $this->surname=$surname;

}

function __get($name){
    return $this->$name;
}

// public function checkCustomer(){
// $con=new DBconnection();
// $users=$con->exec("select email from customer");
// foreach ($users as $user) {
//     var_dump($user);
// }

// }


}