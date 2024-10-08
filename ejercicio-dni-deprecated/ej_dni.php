<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dni</title>
</head>

<body>
    <?php
    if (!isset($_GET["dni"])) {
        print ("<p>Introduzca su dni (GET)</p>");
        print ("<form  action=\"".$_SERVER['PHP_SELF']."\" method=\"GET\">
        <input type=\"text\" name=\"dni\" maxlength=\"8\" minlength=\"8\" >
        <input type=\"submit\" value=\"enviar\">
        </form>");
        print("<br>");
        print ("<p>Introduzca su dni (POST)</p>");
        print ("<form  action=\"".$_SERVER['PHP_SELF']."\" method=\"POST\">
        <input type=\"text\" name=\"dni\" maxlength=\"8\" minlength=\"8\" >
        <input type=\"submit\" value=\"enviar\">
        </form>");
        print("<br>");
        print("<a href=\"".$_SERVER['PHP_SELF']."?dni=44757658\"><button>44757658</button></a>");

    } 
    else {
        $dniuser = $_GET["dni"];
        $numletra = $dniuser % 23;
        $letra = "dni inválido";
        switch ($numletra) {
            case 0:
                $letra = "T";
                break;
            case 1:
                $letra = "R";
                break;
            case 2:
                $letra = "W";
                break;
            case 3:
                $letra = "A";
                break;
            case 4:
                $letra = "G";
                break;
            case 5:
                $letra = "M";
                break;
            case 6:
                $letra = "Y";
                break;
            case 7:
                $letra = "F";
                break;
            case 8:
                $letra = "P";
                break;
            case 9:
                $letra = "D";
                break;
            case 10:
                $letra = "X";
                break;
            case 11:
                $letra = "B";
                break;
            case 12:
                $letra = "N";
                break;
            case 13:
                $letra = "J";
                break;
            case 14:
                $letra = "Z";
                break;
            case 15:
                $letra = "S";
                break;
            case 16:
                $letra = "Q";
                break;
            case 17:
                $letra = "V";
                break;
            case 18:
                $letra = "H";
                break;
            case 19:
                $letra = "L";
                break;
            case 20:
                $letra = "C";
                break;
            case 21:
                $letra = "K";
                break;
            case 22:
                $letra = "E";

        }
        print ("<h1>su dni es " . $dniuser . " y su letra es ".$letra."</h1>");
        print("<a href=\"".$_SERVER['PHP_SELF']."?\"><button>Volver</button></a>");
    }

    ?>

</body>

</html>