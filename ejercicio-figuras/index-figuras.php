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

    $cuadrado= new Cuadrado(30,[0,0,0]);

    print($cuadrado);



    
    ?>
</body>

</html>

<?php

function classAutoLoader($class)
{
    $class = strtolower($class);
    $classFile = $_SERVER['DOCUMENT_ROOT'] . '/servidor/clases/' . $class . '.php';
    if (is_file($classFile) && !class_exists($class))
        include $classFile;
}


?>