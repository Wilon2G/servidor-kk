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
    include(__DIR__."/funciones.php");
    $text="";
    $num;
    $sol=[];
    if (isset($_POST["texto"])) {
        $text=$_POST["texto"];
    }
    else {
        $text = "Esto es un texto de ejemplo, utiliza los botones y los cuadros de texto para modificar su contenido";
    }
    $sol=selectfun($text);
    $text=$sol[0];
    if (count($sol)>1) {
        $num=$sol[1];
    }

    print ("<main><div class=\"opciones\">");
    print ("<form  action=\"" . $_SERVER['PHP_SELF'] . "\" method=\"POST\">");
    print("<textarea name=\"textomodder\" rows=\"4\" cols=\"20\" placeholder=\"Escriba aquí lo que quiera resaltar, quitar, reemplazar...\"></textarea>");
    print("<div class=\"occult\"></div>");
    print("<textarea name=\"texto\" rows=\"20\" cols=\"40\" >".$text."</textarea>");
    if (count($sol)>1) {
       print(mostrarnum($num)) ;
    }
    print("<input type=\"submit\" name=\"remark\" value=\"remark\">");
    print("<input type=\"submit\" name=\"remove\" value=\"remove\">");
    print("<input type=\"submit\" name=\"replace\" value=\"replace\">");
    print("<textarea name=\"replacetxt\" rows=\"1\" cols=\"40\" placeholder=\"Escriba aquí por lo que quiere reemplazar\"></textarea>");
    print("<input type=\"submit\" name=\"count\" value=\"count words\">");
    print("<input type=\"submit\" name=\"countv\" value=\"count vowels\">");
    print("<input type=\"submit\" name=\"lower\" value=\"to lower\">");
    print("<input type=\"submit\" name=\"upper\" value=\"to upper\">");
    print("<input type=\"submit\" name=\"submit\" value=\"Refresh\">");
    print ("</form>");

    print ("</div></main>");





    ?>
</body>

</html>