<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>dni</title>
</head>

<body>
    
    <?php
    print("<div class=opciones >");
        if (!isset($_GET["OPP"])) {
            print("<h1>Elija el método</h1>");
            print ("<div class=botones><a href=\"" . $_SERVER['PHP_SELF'] . "?OPP=0\"><button>Metodo Href</button></a>");
            print ("<a href=\"" . $_SERVER['PHP_SELF'] . "?OPP=1\"><button>Metodo Post</button></a>");
            print ("<a href=\"" . $_SERVER['PHP_SELF'] . "?OPP=2\"><button>Metodo Get</button></a></div>");
        } else {
            switch ($_GET["OPP"]) {
                case 0:
                    # href
                    print ("<a href=\"http://pruebas/ejercicio-dni/dni-calc.php?dni=44757658\"><button>DNI: 44757658</button></a>");
                    break;
                case 1:
                    # post 
                    print ("<h1>Introduzca su dni (POST)</h1>");
                    print ("<form  action=\"http://pruebas/ejercicio-dni/dni-calc.php\" method=\"POST\">
                     <input type=\"text\" name=\"dni\" maxlength=\"8\" minlength=\"8\" required >
                     <input type=\"submit\" value=\"Calcular letra\">
                     </form>");
                    break;
                case 2:
                    # get
                    print ("<h1>Introduzca su dni (GET)</h1>");
                    print ("<form  action=\"http://pruebas/ejercicio-dni/dni-calc.php\" method=\"GET\">
                    <input type=\"text\" name=\"dni\" maxlength=\"8\" minlength=\"8\" required >
                    <input type=\"submit\" value=\"Calcular letra\">
                    </form>");
                    break;
    
                default:
                    # err
                    break;
            }
    
        }
        print("</div>");
    
    

    ?>

</body>

</html>