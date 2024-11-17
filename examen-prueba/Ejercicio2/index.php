<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    if (isset($_POST["submit"])) {
        if (isset($_POST["statsMode"])) {
            setcookie("statsMode", $_POST["statsMode"], time() + 60 * 60 * 24 * 2);
        } else {
            setcookie("statsMode", "pantalla", time() + 60 * 60 * 24 * 2);
        }
        if (isset($_POST["statsType"])) {
            setcookie("statsType", $_POST["statsType"], time() + 60 * 60 * 24 * 2);
        } else {
            setcookie("statsType", "barras", time() + 60 * 60 * 24 * 2);
        }
        header("location:./ejercicio2.php");
    }

    print ("<form  action=\"" . $_SERVER['PHP_SELF'] . "\" method=\"POST\">
    
    <input type=\"radio\" name=\"statsMode\" value=\"pantalla\">Ver Pantalla</input>
    <input type=\"radio\" name=\"statsMode\" value=\"fichero\">Sacar Fichero</input>
    <br/>

    <input type=\"radio\" name=\"statsType\" value=\"barras\">Ver Diagrama de Barras</input>
    <input type=\"radio\" name=\"statsType\" value=\"sectores\">Ver Diagrama de Sectores</input>
    <br/>
    <input type=\"submit\" name=\"submit\"/>
    
    ");


    print ("</form>");
    ?>
</body>

</html>