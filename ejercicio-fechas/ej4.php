<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    include(__DIR__."/calendario_funciones.php");
    print("<div class=\"info\">");
    print('<h1>Ejercicio 4</h1>');
    $meses=array(1,2,3,4,5,6,7,8,9,10,11,12);
    usarArrWalk($meses);
    print("</div>");
    ?>
    <a href="./index"><button>Volver</button></a>
</body>
</html>