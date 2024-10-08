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

    if ( !isset($_GET["tabla"])){
        print("<div class=\"botones\">");
    for ($i = 1; $i < 11; $i++) {
        print("<a href=\"".$_SERVER['PHP_SELF']."?tabla=".$i."\"><button>Mostrar ".$i." tablas</button></a>");
    }
    print("</div>");
}
else{
 $tab = $_GET["tabla"];
 print("<a href=\"".$_SERVER['PHP_SELF']."?\"><button>Volver</button></a>");
 print ("<h1>Mostrando las " . $tab . " primeras tablas" . "</h1> <div class=tablas>");
        for ($i = 1; $i < $tab + 1; $i++) {

            print ("<table> <caption>Tabla del " . $i . "</caption>");
            for ($j = 0; $j < 10; $j++) {
                print ("<tr> <th>" . $i . " X " . $j . " = " . $i * $j . "</th></tr>");
            }
            print ("</table> </div>");
        }
}

    ?>
       
</body>
</html>