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
    <?php
    if (!isset($_COOKIE['languaje']) && !isset($_COOKIE['backColor'])) {
        header("Location: ./languajeForm.php");
      }
    ?>
    <div class="mainDetails">
<a href="./languajeForm"><button>Change languaje</button></a>

<?php
$file = file_get_contents("./languajes.json");
$languajes = json_decode($file, true);
showCurriForm($languajes[$_COOKIE['languaje']], $_COOKIE['backColor']);

?>

    </div>
    
</body>
</html>