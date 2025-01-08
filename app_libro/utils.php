<?php
include_once "./clases/DBconnection.php";
function classAutoLoader($class)
{
    $class = strtolower($class);
    $classFile = $_SERVER['DOCUMENT_ROOT'] . '/servidor/app_libro/clases' . $class . '.php';
    if (is_file($classFile) && !class_exists($class))
        include $classFile;
}

function checkCustomer2($username, $password) {
    // Crea una instancia de DBconnection

    $conObj = new DBconnection();

    $con=$conObj->getConnect();

    // Realiza la consulta usando 'query' para obtener todos los correos
    $users=$con->query("SELECT email FROM customer")->fetchAll();
    foreach ($users as $user ) {
        var_dump($user);
    }
    
}



function checkCustomer($username, $password){
    $con=new DBconnection();
    $users=($con->getConnect()->query("select email from customer"));
    foreach ($users as $user) {
        var_dump($user);
    }
    
}