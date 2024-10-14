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
    print("<div class=\"info\"");
    print('<h1>Ejercicio 1</h1>');
    date_default_timezone_set('Europe/Madrid');
    print("<p>Fecha de hoy: ".date("d-m-Y",time())."</p>");
    print("<p>Fecha de mañana: ".date('d-m-Y',mktime(0,0,0,date('m',time()),date('d',time())+1,date('y',time())))."</p>");
    print("<p>Hora actual: ".date("G-i-s",time())."</p>");
    print("<p>Fecha del próximo Lunes: ".date("d-m-Y", strtotime("next monday"))."</p>");
    print('<h1>Ejercicio 2</h1>');
    print(calendario_mensual(2024,5));
    print('<h1>Ejercicio 3</h1>');
    calendario_anual(2024);
    print('<h1>Ejercicio 4</h1>');
    print("</div>");
    
    ?>
    
</body>
</html>