<!-- Nombre, movil, deportes, idiomas, sexo, edad, apellidos, fecha de nacimiento (calendar) -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php
  include(__DIR__ . "/functions/funciones.php");



  if (!isset($_POST["submit"]) && checkInputs()) {
    print ("<title>Formulario curriculum</title>");
  } else {
    print ("<title>" . $_POST["nombre"] . " - Curriculum Vitae</title>");
  }
  ?>

  <link type="text/css" rel="stylesheet" href="style.css">
  <link href='http://fonts.googleapis.com/css?family=Rokkitt:400,700|Lato:400,300' rel='stylesheet' type='text/css'>

</head>

<body>
  <div class="mainDetails">
  <?php

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