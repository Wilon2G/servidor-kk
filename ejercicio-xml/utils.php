<?php
include 'ejemplo.php';
//$xml = simplexml_load_string($xmlstr);
$xml = @simplexml_load_file("data.xml");
function showAll(){
    global $xml;
    foreach ($xml->evento as $evento) {
        print("<div class=\"evento\">");
        print("<div class=\"imgContainer\"><img style=\"width: 100%\" src=\"".$evento->caratula."\" alt=\"img not found\"></div>");
        
        print("<div class=\"infoContainer\">");
        print("<h3>".$evento->titulo["value"]."</h3>"
        ."<a href=\"".$evento->compra."\" ><button>Compra tus entradas!</button></a>"
        ."<p>Calificación: ".$evento->calificacion."</p>"
        ."<p>Género: ".$evento->genero."</p>"
        ."<p>Duración: ".$evento->duracion."min</p>"
        ."<div><p>Sinopsis:</p><p>".$evento->sinopsis."</p></div>"
        ."<iframe src=\"".$evento->trailer."\" width=\"300\" height=\"200\" ></iframe>"


        
    );
    print("</div>");

        print("</div><br>");
    }
}


