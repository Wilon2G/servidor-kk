<?php

$baraja=scandir("./media");
array_shift($baraja);
array_shift($baraja);
for ($i=0; $i < sizeof($baraja); $i++) { 
    $baraja[$i]=preg_replace('/([0-9]+)([a-zA-Z]+)/', '$1-$2', $baraja[$i]);
}

//preg_replace('/(\d+)([a-zA-Z]+)/', '$1-$2', $carta);
function showBaraja($palo=0,$num=0){
    global $baraja;

    print('<p>'.$num.'</p>');


for ($i=0; $i < sizeof($baraja); $i++) { 
    $ruta=explode('-',$baraja[$i]);
     //print('<p>'.$baraja[$i].'</p><br>');
    print('<img src="./media/'.$ruta[0].$ruta[1].'"> <br>');
}
}


function barajar(){
    global $baraja;
    shuffle($baraja);
}


function sortBaraja(){
    global $baraja;
    $oros=[];
    $copas=[];
    $espadas=[];
    $bastos=[];
    for ($i=0; $i < sizeof($baraja); $i++) { 
        $palo=explode('-',$baraja[$i]);
        if ($palo[1]==='oros.jpg') {
           array_push($oros,$baraja[$i]);
        }
        if ($palo[1]==='copas.jpg') {
            array_push($copas,$baraja[$i]);
         }
         if ($palo[1]==='espadas.jpg') {
            array_push($espadas,$baraja[$i]);
         }
         if ($palo[1]==='bastos.jpg') {
            array_push($bastos,$baraja[$i]);
         }
    }
    natsort($oros);
    natsort($copas);
    natsort($espadas);
    natsort($bastos);

    $baraja=array_merge($oros,$copas,$espadas,$bastos);
    
}

function form(){
    print ("
    <form action=\"" . $_SERVER['PHP_SELF'] . "\" method=\"POST\">
    <label>Ordenar: 
    <input type=\"checkbox\" name=\"sorted\" checked>
    </label>
    <br><br>
    <label>Palo: 
    <select name=\"palo\" multiple>
        <option value=\"oros\">Oros</option>
        <option value=\"copas\">Copas</option>
        <option value=\"espadas\">Espadas</option>
        <option value=\"bastos\">Bastos</option>
    </select>
    </label>
    <br><br>
    <label>Número: 
    <select name=\"num\" multiple>
        <option value=\"1\">As</option>
        <option value=\"2\">2</option>
        <option value=\"3\">3</option>
        <option value=\"4\">4</option>

        <option value=\"5\">5</option>
        <option value=\"6\">6</option>
        <option value=\"7\">7</option>
        <option value=\"8\">8</option>

        <option value=\"9\">9</option>
        <option value=\"10\">Sota</option>
        <option value=\"11\">Caballo</option>
        <option value=\"12\">Rey</option>
    </select>
    </label>
    <br><br>");
    print ("<input type=\"submit\" value=\"submit\"></form>");



}


// $target='/'.($num=0?'*':$num ). '-' . ($palo=0?'*':$palo).'/';
// $arrayShow=[];
// for ($i=0; $i < sizeof($baraja); $i++) { 
//     if (preg_match($target,$baraja[$i] )) {
//         array_push($arrayShow,$baraja[$i]);
//     }
// }

// for ($i=0; $i < sizeof($arrayShow); $i++) { 
//     $ruta=explode('-',$arrayShow[$i]);
    
//     print('<img src="./media/'.$ruta[0].$ruta[1].'"> <br>');
// }