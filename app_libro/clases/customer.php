<?php

include "../utils.php";
spl_autoload_register('classAutoLoader');
class Customer{
private $password;
private $email;
private $type;

public function __construct($email, $password, $type ){
    $this->email=$email;
    $this->password=$password;
    $this->type=$type;
}

public function checkCustomer(){
$con=new DBconnection();

}


}