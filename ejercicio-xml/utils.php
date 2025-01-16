<?php
include 'ejemplo.php';
$xml = simplexml_load_string($xmlstr);

function showAll(){
    global $xml;
    foreach ($xml as $evento) {
        print($evento->titulo["value"]."<br>");
    }
}


