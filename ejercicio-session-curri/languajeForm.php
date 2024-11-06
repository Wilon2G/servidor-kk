<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Languaje Form</title>

  <link type="text/css" rel="stylesheet" href="style.css">
  <link href='http://fonts.googleapis.com/css?family=Rokkitt:400,700|Lato:400,300' rel='stylesheet' type='text/css'>

</head>
<body>

<?php


 print("<div class=\"mainDetails\">");
 print('<h1>Seleccione sus ajustes:</h1>');
 print ("<div class=\"mainDetails\"><form  action=\"./index.php\" method=\"POST\">");
 print('<label>Languaje:</label>');
 print('<input type="radio" name="languaje" value="es">Spanish</input>');
 print('<input type="radio" name="languaje" value="fr">French</input>');
 print('<input type="radio" name="languaje" value="de">German</input>');
 print('<input type="radio" name="languaje" value="zh">Chinesse</input>');
 print('<input type="radio" name="languaje" value="en">English</input><br><br>');
 print('<label>Color de fondo:</label>');
 print('<input type="radio" name="backColor" value="lightGrey">Gris</input>');
 print('<input type="radio" name="backColor" value="lightYellow">Amarillo</input><br><br>');
 print('<input type="submit" name="submitlang" value="confirm"></form>');


 

print("</div>");



?>
    
</body>
</html>