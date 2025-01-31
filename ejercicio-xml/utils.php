<?php
//include 'ejemplo.php';
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

            /* . "<lable>
            <input type=\"submit\" name=\"editDates\"  value=\"Editar fechas\" ></lable>" */
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
        <input type=\"submit\" class=\"cancel\" name=\"deleteEvent\" value=\"Eliminar\"></input>

        </form>
        ");

        print ("</div><br>");
}

function saveChanges($eventId, $title, $buyLink, $calification, $genre, $duration, $sinopsis, $trailLink){
    global $xml;
    foreach ($xml->evento as $evento) {
        if ($evento->titulo["id"]==$eventId) {

            $evento->titulo["value"]=(empty($title )?$evento->titulo["value"]:$title);

            $evento->compra=(empty($buyLink )?$evento->compra:$buyLink);

            $evento->calificacion=(empty($calification )?$evento->calification:$calification);

            $evento->genero=(empty($genre )?$evento->genero:$genre);

            $evento->duracion=(empty($duration )?$evento->duracion:$duration);

            $evento->sinopsis=(empty($sinopsis )?$evento->sinopsis:$sinopsis);

            $evento->trailer=(empty($trailLink )?$evento->trailer:$trailLink);


            $xml->saveXML("data.xml");
        }
    }

}

function createNewEvent($title, $buyLink, $calification, $genre, $duration, $sinopsis, $trailLink,$caratula ){
    global $xml;

    $newEvent= $xml->addChild("evento");
    $newEvent->titulo["value"]=$title;
    $newEvent->titulo["id"]=rand(0,10000);
    $newEvent->titulo["uid"]=rand(0,10000);



    $newEvent->addChild('compra', $buyLink);
    $newEvent->addChild('caratula', $caratula);
    $newEvent->addChild('calificacion', $calification);
    $newEvent->addChild('genero', $genre);
    $newEvent->addChild('duracion', $duration);
    $newEvent->addChild('sinopsis', $sinopsis);
    $newEvent->addChild('trailer', $trailLink);

    $fechas = $newEvent->addChild('fechas');
    $fechaEvento = $fechas->addChild('fecha');
    $fechaEvento['value'] = "20/20/2020";
    
    // Crear la sesión en esa fecha
    $sesiones = $fechaEvento->addChild('sesiones');
    $salaEvento = $sesiones->addChild('sala', "99:99");
    $salaEvento['value'] = "99";

    $xml->saveXML("data.xml");

}

function deleteEvent($eventId){
    global $xml;

    $xpath="//evento[titulo[@id=".$eventId."]]";
    $event=$xml->xpath($xpath);

    if ($event) {
        unset($event[0][0]);
        $xml->saveXML("data.xml");

    }
    else {
        throw new Exception("Error deleting event", 1);
        
    }

}

function updateDate($eventId,$dateId,$newDate){
global $xml;

$dates=getDatesFromId($eventId);

foreach ($dates[0] as $date) {
    //print($date["value"]."==".$newDate."??");
    if ($date["value"]==$newDate) {
        return "Error, la fecha introducida ya existe en el evento";
    }
}

$xpath = "//evento[titulo[@id='$eventId']]/fechas/fecha[@value='$dateId']";
$fechaElement = $xml->xpath($xpath);

if ($fechaElement) {
    if (empty($newDate)) {
        unset($fechaElement[0][0]);
        $xml->saveXML("data.xml");
        return "La fecha se ha eliminado con éxito"; 
    }
    $fechaElement[0]['value'] = $newDate;

    $xml->saveXML("data.xml");
    return "Fecha actualizada con éxito"; 
}

return "Ha ocurrido un error";

}

function newEventForm(){
    print("<div class=\"evento\"><h1>Añadir Nuevo Evento:</h1>");

    print ("<form action=\"#\" method=\"POST\" class=\"infoContainer\">");
    print ("
    <lable>Título: 
        <input type=\"text\" name=\"title\"  required /></lable> 
        <lable>Carátula:
        <input type=\"text\" name=\"caratula\" required /></lable>
        "
        

        . "<lable>Link a compra: 
        <input type=\"text\" width=\"150px\" name=\"buyLink\" required /></lable>"

        . "<lable>Calificación: 
        <input type=\"text\" name=\"calification\"  required /></lable>"

        . "<lable>Género: 
        <input type=\"text\" name=\"genre\" required /> </lable>"

        . "<lable>Duración: 
        <input type=\"text\" name=\"duration\" required /></lable>"

        . "<lable>Sinopsis: 
        <textarea cols=\"200\" rows=\"6\" class=\"sinopsis\" name=\"sinopsis\" required > </textarea> </lable>"

        . "<lable>Link al tráiler: 
        <input type=\"text\" name=\"trailLink\"  required ></lable>"

        /* . "<lable>
        <input type=\"submit\" name=\"editDates\"  value=\"Editar fechas\" ></lable>" */
    );
    print("
    <input type=\"submit\" class=\"edit\" name=\"newEvent\" value=\"Guardar\"></input>
    </form>
    <form action=\"#\" method=\"POST\" class=\"infoContainer\">
    <input type=\"submit\" class=\"cancel\" name=\"cancel\" value=\"Cancelar\"></input>
    </form>
    ");

    print ("</div><br>");



   
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

function newEventButton(){
    print("<form action=\"#\" method=\"POST\" >
    <input class=\"newEventButton\" type=\"submit\" name=\"openEventForm\" value=\"Nuevo evento\" />
    </form>
    ");
}