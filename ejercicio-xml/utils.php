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
    print ("<div id=\"" . $evento->titulo["id"] . "\" class=\"evento\">");
        print ("<div class=\"imgContainer\"><img src=\"" . $evento->caratula . "\" alt=\"img not found\"></div>");

        print ("<form action=\"#" . $evento->titulo["id"] . "\" method=\"POST\" class=\"infoContainer\">");
        print ("
        <lable>Título: 
            <input type=\"text\" name=\"title\"  value=\"" . $evento->titulo["value"] . "\" /></lable>"

            . "<lable>Link a compra: 
            <input type=\"text\" width=\"150px\" name=\"buyLink\" value=\"".trim($evento->compra)."\" /></lable>"

            . "<lable>Calificación: 
            <input type=\"text\" name=\"calification\" value=\"" . trim($evento->calificacion) . "\" /></lable>"

            . "<lable>Género: 
            <input type=\"text\" name=\"genre\" value=\"" . trim($evento->genero) . "\" /> </lable>"

            . "<lable>Duración: 
            <input type=\"text\" name=\"duration\" value=\"" . trim($evento->duracion ). "min\" /></lable>"

            . "<lable>Sinopsis: 
            <textarea cols=\"200\" rows=\"6\" class=\"sinopsis\" name=\"sinopsis\" > " . trim($evento->sinopsis) . " </textarea> </lable>"

            . "<lable>Link al tráiler: 
            <input type=\"text\" name=\"trailLink\"  value=\"" . trim($evento->trailer) . "\" ></lable>"

            . "<lable>
            <input type=\"submit\" name=\"editDates\"  value=\"Editar fechas\" ></lable>"
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
    print ("<div id=\"" . $evento->titulo["id"] . "\" class=\"evento\">");
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
        print ("<div><h3>Fechas:</h3><ul>");
        foreach ($evento->fechas->fecha as $fecha) {
            print("<li>Día: ".$fecha["value"]."<ul>");
            foreach ($fecha->sesiones->sala as $sala) {
                print("<li>Sala: ".$sala["value"]." Hora: ".$sala."</li>");
            }
            print("</ul></li>");
        }
        print ("</ul></div>");

        print ("</div>");

        print("<form action=\"#" . $evento->titulo["id"] . "\" method=\"POST\">
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
        }
    }

}

function newEventForm(){
    print("<div class=\"eventForm\"><h1>Añadir Nuevo Evento:</h1>");



    print("</div>");
}

function getTitleFromId($id){
    global $xml;

    $query = "//evento/titulo[@id='$id']";

    $result = $xml->xpath($query);

    if ($result) {
        return $result;
    }
    else {
        return null;
    }
}

function getDatesFromId($id){
    global $xml;

    $query = "//evento/titulo[@id='$id']/../fechas";

    $result = $xml->xpath($query);

    if ($result) {
        return $result;
    }
    else {
        return null;
    }
}