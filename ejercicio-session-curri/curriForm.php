<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
<title>Formulario curriculum</title>
  <link type="text/css" rel="stylesheet" href="style.css">
  <link href='http://fonts.googleapis.com/css?family=Rokkitt:400,700|Lato:400,300' rel='stylesheet' type='text/css'>

</head>





<body>
    <?php
include(__DIR__ . "/functions/funciones.php");


    if (!isset($_COOKIE['languaje']) && !isset($_COOKIE['backColor'])) {
        header("Location: ./languajeForm.php");
      }
    ?>


    <div class="mainDetails">
<a href="./languajeForm"><button>Change languaje</button></a>

<?php
$file = file_get_contents("./languajes.json");
$languajes = json_decode($file, true);

if (isset($_COOKIE["FormData"])) {
  session_name("FormData");
  session_start();

  $values=$_SESSION;
  $style=null;

  print("<p>existe</p>");
}
else {
  $style=null;
  $values=null;
}


printForm($languajes[$_COOKIE['languaje']], $_COOKIE['backColor'],$style,$values);



var_dump($_SESSION);







// if (isset($_POST["submit"])) {
//   if (!checkInputs()) {

//     printBody();
//   } else {
//     print ("<h1 class=\"mainDetails\">Error, por favor rellene todos los datos</h1>");
//     printForm($cookiesLang, $cookiesColor);
//   }

// } else {
//   printForm($cookiesLang, $cookiesColor);
// }


// showCurriForm($languajes[$_COOKIE['languaje']], $_COOKIE['backColor']);

?>

    </div>
    
</body>
</html>