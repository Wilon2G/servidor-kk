<?php

$baraja=scandir("./media");
array_shift($baraja);
array_shift($baraja);
for ($i=0; $i < sizeof($baraja); $i++) { 
    $baraja[$i]=preg_replace('/([0-9]+)([a-zA-Z]+)/', '$1-$2', $baraja[$i]);
}

//preg_replace('/(\d+)([a-zA-Z]+)/', '$1-$2', $carta);

function showHand($handNum,$sorted){
    global $baraja;
    barajar();
    $hand=[];
    for ($i=0; $i < $handNum; $i++) { 
        $ruta=explode('-',$baraja[$i]);
        array_push($hand,$baraja[$i]);
    }
    if ($sorted) {
        $hand=sortHand($hand);
    }
    for ($i=0; $i < $handNum; $i++) { 
        $ruta=explode('-',$hand[$i]);
        print('<img src="./media/'.$ruta[0].$ruta[1].'"> <br>');
    }


    sortBaraja();
}

function sortHand($hand){
    
    $oros=[];
    $copas=[];
    $espadas=[];
    $bastos=[];
    for ($i=0; $i < sizeof($hand); $i++) { 
        $palo=explode('-',$hand[$i]);
        if ($palo[1]==='oros.jpg') {
           array_push($oros,$hand[$i]);
        }
        if ($palo[1]==='copas.jpg') {
            array_push($copas,$hand[$i]);
         }
         if ($palo[1]==='espadas.jpg') {
            array_push($espadas,$hand[$i]);
         }
         if ($palo[1]==='bastos.jpg') {
            array_push($bastos,$hand[$i]);
         }
    }
    natsort($oros);
    natsort($copas);
    natsort($espadas);
    natsort($bastos);

    $hand=array_merge($oros,$copas,$espadas,$bastos);
    return $hand;
}

function showBaraja($palo,$num){
    global $baraja;

    


if (is_null($palo)) {
    $palo=getPalosNum(true);
    
}
if (is_null($num)) {
    $num=getPalosNum(false);
   
}


for ($i=0; $i < sizeof($baraja); $i++) { 
    $ruta=explode('-',$baraja[$i]);
     //print('<p>'.$baraja[$i].'</p><br>');
     if (in_array($ruta[0],$num)&&in_array($ruta[1],$palo)) {
        print('<img src="./media/'.$ruta[0].$ruta[1].'"> <br>');
     }
    
}
}

function getPalosNum($b){
    global $baraja;
    $palos=[];
    $nums=[];
    for ($i=0; $i < sizeof($baraja); $i++) { 
        $val=explode('-',$baraja[$i]);
        array_push($nums,$val[0]);
        array_push($palos,$val[1]);
    }
    if ($b) {
        return $palos;
    }
    return $nums;
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
    
    <label>Palo: 
    <select name=\"palo[]\" multiple>
        <option value=\"oros.jpg\">Oros</option>
        <option value=\"copas.jpg\">Copas</option>
        <option value=\"espadas.jpg\">Espadas</option>
        <option value=\"bastos.jpg\">Bastos</option>
    </select>
    </label>
    
    <label>Número: 
    <select name=\"num[]\" multiple>
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
    <label>Mano aleatoria: 
    <input type=\"number\" name=\"mano\" max=48 min=1>
    </label>
    ");
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