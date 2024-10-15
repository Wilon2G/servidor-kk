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
    print('<h1>Ejercicio 3</h1>');
    calendario_anual(2024);
    print("</div>");
    ?>
    <a href="./index"><button>Volver</button></a>
</body>
</html>