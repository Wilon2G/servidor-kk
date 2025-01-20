<?php
include 'ejemplo.php';
//$xml = simplexml_load_string($xmlstr);
$xml = @simplexml_load_file("data.xml");
function showAll($eventId)
{
    global $xml;
    foreach ($xml->evento as $evento) {
        if ($evento->titulo["id"]==$eventId) {
            //print("<h1>editar este</h1>");
            editPrint($evento);
        }
        else {
            normalPrint($evento);
        }
    
    }
}

function editPrint($evento){
    global $xml;
    print ("<div class=\"evento\">");
        print ("<div class=\"imgContainer\"><img src=\"" . $evento->caratula . "\" alt=\"img not found\"></div>");

        print ("<form action=\"#\" method=\"POST\" class=\"infoContainer\">");
        print ("
        <lable>Título: 
            <input type=\"text\" name=\"title\"  value=\"" . $evento->titulo["value"] . "\" /></lable>"

            . "<lable>Link a compra: 
            <input type=\"text\" width=\"150px\" name=\"buyLink\" value=\"".$evento->compra."\" /></lable>"

            . "<lable>Calificación: 
            <input type=\"text\" name=\"calification\" value=\"" . $evento->calificacion . "\" /></lable>"

            . "<lable>Género: 
            <input type=\"text\" name=\"genre\" value=\"" . $evento->genero . "\" /> </lable>"

            . "<lable>Duración: 
            <input type=\"text\" name=\"duration\" value=\"" . $evento->duracion . "min\" /></lable>"

            . "<lable>Sinopsis: 
            <textarea cols=\"200\" rows=\"6\" class=\"sinopsis\" name=\"sinopsis\" > " . $evento->sinopsis . " </textarea> </lable>"

            . "<lable>Link al tráiler: 
            <input type=\"text\" name=\"trailLink\"  value=\"" . $evento->trailer . "\" ></lable>"
        );
        print("
        <input type=\"hidden\" name=\"eventId\" value=\"".$evento->titulo["id"]."\">
        <input type=\"submit\" class=\"edit\" name=\"saveChanges\" value=\"Guardar\"></input>
        <input type=\"submit\" class=\"cancel\" name=\"cancel\" value=\"Cancelar\"></input>
        </form>
        ");

        print ("</div><br>");
}

function normalPrint($evento){
    global $xml;
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

        print("<form action=\"#\" method=\"POST\">
        <input type=\"hidden\" name=\"eventId\" value=\"".$evento->titulo["id"]."\">
        <input type=\"submit\" class=\"edit\" name=\"edit\" value=\"Editar\"></input>
        </form>
        ");

        print ("</div><br>");
}

function saveChanges($eventId, $title, $buyLink, $calification, $genre, $duration, $sinopsis, $trailLink ){
    global $xml;
    foreach ($xml->evento as $evento) {
        if ($evento->titulo["id"]==$eventId) {
            $evento->titulo["value"]=(empty($title )?$evento->titulo["value"]:$title);
            $xml->saveXML("data.xml");
            exit();
        }
    }

}