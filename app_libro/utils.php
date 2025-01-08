<?php
include_once "./clases/DBconnection.php";
function classAutoLoader($class)
{
    $class = strtolower($class);
    $classFile = $_SERVER['DOCUMENT_ROOT'] . '/servidor/app_libro/clases' . $class . '.php';
    if (is_file($classFile) && !class_exists($class))
        include $classFile;
}

function checkCustomer($customer){
    $con=new DBconnection();
    $users=($con->getConnect()->exec("select email from customer"));
    foreach ($users as $user) {
        var_dump($user);
    }
    
    }