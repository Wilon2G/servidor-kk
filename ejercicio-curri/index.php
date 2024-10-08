<!-- Nombre, movil, deportes, idiomas, sexo, edad, apellidos, fecha de nacimiento (calendar) -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    include(__DIR__."/functions/funciones.php");
    if (!isset($_POST["submit"]) && checkInputs()) {
      print("<title>Formulario curriculum</title>");
    }
    else{
      print("<title>".$_POST["nombre"]." - Curriculum Vitae</title>");
    }
    ?>
    
    <link type="text/css" rel="stylesheet" href="style.css">
	<link href='http://fonts.googleapis.com/css?family=Rokkitt:400,700|Lato:400,300' rel='stylesheet' type='text/css'>

</head>

<body>
    <?php
    
    if (isset($_POST["submit"])) {
      if (!checkInputs()) {
        
        printBody();
      }
      else{
        print("<h1 class=\"mainDetails\">Error, por favor rellene todos los datos</h1>");
        printForm();
      }
      
    }
    else {
      
      printForm();
    }
    
    ?>
</body>

</html>