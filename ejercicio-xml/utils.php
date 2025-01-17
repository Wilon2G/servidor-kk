<?php
include 'ejemplo.php';
//$xml = simplexml_load_string($xmlstr);
$xml = @simplexml_load_file("data.xml");
function showAll()
{
    global $xml;
    foreach ($xml->evento as $evento) {
        print ("<div class=\"evento\">");
        print ("<div class=\"imgContainer\"><img src=\"" . $evento->caratula . "\" alt=\"img not found\"></div>");

        print ("<div class=\"infoContainer\">");
        print ("<h3 style=\"width: fit-content;\" >" . $evento->titulo["value"] . "</h3>"
            . "<a style=\"width: fit-content;\" href=\"" . $evento->compra . "\" ><button>Compra tus entradas!</button></a>"
            . "<p>Calificación: " . $evento->calificacion . "</p>"
            . "<p>Género: " . $evento->genero . "</p>"
            . "<p>Duración: " . $evento->duracion . "min</p>"
            . "<div class=\"sinopsis\" ><p>Sinopsis:</p><p>" . $evento->sinopsis . "</p></div>"
            . "<a style=\"width: fit-content;\" href=\"" . $evento->trailer . "\" ><button>Tráiler</button></a>"
        );
        print ("</div>");

        print("<button class=\"edit\" >Edit</button>");

        print ("</div><br>");
    }
}


