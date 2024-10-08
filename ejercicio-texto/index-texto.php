<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ej_texto</title>
</head>
<body>
    <div class="center">
        <?php 
        $txt="hola mundo";
        if (isset($_POST["texto"])) {
            $txt=$_POST["texto"];
        }
        print ("<form  action=\"".$_SERVER['PHP_SELF']."\" method=\"POST\">");
        print("<textarea name=\"texto\" rows=\"4\" cols=\"40\">".$txt."</textarea>");
        print("<input type=\"submit\" name=\"submit\" value=\"Procesar texto\">");
        print ("</form>");
        if (isset($_POST["texto"])) {
            print("Texto procesado= ".$_POST["texto"]);
        }
        ?>
        
    </div>
</body>
</html>