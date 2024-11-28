<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    require_once "../clases/MiCabecera.php";

    $header= new MiCabecera("Ejercicio de cabeceras","green");

    $header->paintHeader();


    ?>
    
</body>
</html>