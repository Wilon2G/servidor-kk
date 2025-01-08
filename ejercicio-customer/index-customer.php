<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    spl_autoload_register('classAutoLoader');
    //require_once "../clases/Customer.php";

    $customer1 = new Customer( "Pepe", "Longuito Menzol", "pepitomenzolo@gmail.com");
    $customer2 = new Customer( "Jertrudis", "Mendoza Ozaoza", "mendzamendza@gmail.com");
    $customer3 = new Customer("Alberto", "Canal Abierto", "albertodejo@gmail.com");

    $customers = [$customer1, $customer2, $customer3];

    for ($i=0; $i < sizeof($customers); $i++) { 
        print($customers[$i]);
    }
    

    ?>
</body>

</html>


<?php

 function classAutoLoader($class){
    $class=strtolower($class);
    $classFile=$_SERVER['DOCUMENT_ROOT'].'/servidor/clases/'.$class.'.php';
    if(is_file($classFile)&&!class_exists($class)) include $classFile;}

    
?>