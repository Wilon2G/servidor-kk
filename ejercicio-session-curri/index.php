<!-- Nombre, movil, deportes, idiomas, sexo, edad, apellidos, fecha de nacimiento (calendar) -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicio curriculum</title>
  <link type="text/css" rel="stylesheet" href="style.css">
</head>




<body>
  <div class="mainDetails">
  <?php
include(__DIR__ . "/functions/funciones.php");


checkAddCookies();



if (!isset($_COOKIE['languaje']) && !isset($_COOKIE['backColor'])&&!checkAddCookies()) {
  
  header("Location: ./languajeForm.php");
}

if (isset($_COOKIE['languaje']) && isset($_COOKIE['backColor'])) {
  header("Location: ./curriForm.php");
}


  ?>

</div>
</body>

</html>















<!-- print("<div class=\"mainDetails\">");
    print('<h1>Debuggin</h1>');
    var_dump($languajes[$_COOKIE['languaje']]);
    print('</div>'); -->