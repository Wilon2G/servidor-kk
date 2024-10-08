<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Archivos</title>
</head>
<body>
    <?php
    include(__DIR__."/functions.php");
    if (isset($_POST['submit'])) {
        if ($_POST['submit']=="Procesar imagen") {
            if (isset($_FILES["imagen"])&&isset($_POST['imgname'])&&isset($_POST['imgsurname'])) {
                uploadImg("imagen",$_POST['imgname'],$_POST['imgsurname']);
            }
        }
        else {
            if ($_POST['submit']=="Buscar Imagen") {
               print(showImg($_POST['imgname'],$_POST['imgsurname'])) ;
            }
        }
    }
    else {
    print("<h1>Escoja una imagen</h1>");
    print ("<form  action=\"".$_SERVER['PHP_SELF']."\" method=\"POST\" ENCTYPE=\"multipart/form-data\">");
    
    print("<input type='file' name='imagen'/><br><br>");
    print("<label>Nombre: </label><input type='text' name='imgname'/><br><br>");
    print("<label>Apellido: </label><input type='text' name='imgsurname'/><br><br>");
    print("<input type=\"submit\" name=\"submit\" value=\"Procesar imagen\">");
    print ("</form>");
    print("");

    print("<h1>Busque una imagen</h1>");
    print ("<form  action=\"".$_SERVER['PHP_SELF']."\" method=\"POST\" ");
    print("<label>Nombre: </label><input type='text' name='imgname'/ required><br><br>");
    print("<label>Apellido: </label><input type='text' name='imgsurname'/ required><br><br>");
    print("<label>Formato de la imagen: <input type=\"radio\" name=\"format\" value=\"jpeg\">jpeg</input>");
    print("<input type=\"radio\" name=\"format\" value=\"gif\">gif</input>");
    print("<input type=\"radio\" name=\"format\" value=\"png\">png</input><br><br>");
    print("<input type=\"submit\" name=\"submit\" value=\"Buscar Imagen\">");
    print ("</form>");


    }


    ?>
    
</body>
</html>