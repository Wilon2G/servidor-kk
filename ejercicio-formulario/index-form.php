<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h1></h1>
    </header>
    <?php
    print ("<div class=\"opciones\">");
    if (!isset($_GET["state"]) || !isset($_POST["deporte"]) || !isset($_POST["horario"])) {
        print ("<form  action=\"" . $_SERVER['PHP_SELF'] . "?state=1\" method=\"POST\">
       <h3>Nombre:<h3>
        <input type=\"text\" name=\"nombre\" maxlength=\"30\" minlength=\"1\" required >
        <br><br>
        <h3>Deportes:<h3>
        <input type=\"checkbox\" value=\"Tenis\" name=\"deporte[]\" >Tenis</input>
        <input type=\"checkbox\" value=\"Fútbol\" name=\"deporte[]\" >Fútbol</input>
        <input type=\"checkbox\" value=\"Ciclismo\" name=\"deporte[]\">Ciclismo</input>
        <input type=\"checkbox\" value=\"Natación\" name=\"deporte[]\">Natación</input>
        <br><br>
        <h3>Horario:<h3>
        <input type=\"radio\" value=\"mañana\" name=\"horario\">Horario de Mañana</input>
        <input type=\"radio\" value=\"tarde\" name=\"horario\">Horario de tarde</input>
        <input type=\"radio\" value=\"noche\" name=\"horario\">Horario de noche</input>
        <br><br>
        <input type=\"submit\" value=\"Inscribirse\">
        </form>");
    } else {

        $dep = $_POST["deporte"];
        $usuario = $_POST["nombre"];
        print ("<h1>" . $usuario . " Inscrito en:</h1>");
        print ("<div class=\"resultados\"><ul>");
        foreach ($dep as $k => $v) {
            print ("<li>" . $v . "</li>");
        }
        print ("</ul></div>");
        print ("<br><h3>Con horario de " . $_POST["horario"]) . "<br>";
        print ("<h3> Fecha de inscripción: " . date('Y-m-d') . "<br><br>");


        print ("<a href=\"" . $_SERVER['PHP_SELF'] . "\"><button>Volver</button></a>");
    }


    print ("</div>");
    ?>

</body>

</html>