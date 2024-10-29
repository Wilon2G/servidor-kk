<?php
function form(){
    print ("
    <form action=\"" . $_SERVER['PHP_SELF'] . "\" method=\"POST\">
    <label>Filas: 
    <input type=\"number\" name=\"rows\" value=3>
    </label>
    <label>Columnas: 
    <input type=\"number\" name=\"cols\" value=3>
    </label>
    <label>Alto (px): 
    <input type=\"number\" name=\"height\">
    </label>
    <label>Ancho (px): 
    <input type=\"number\" name=\"width\">
    </label>
    <label>Color de fondo: 
    <input type=\"text\" name=\"color\">
    </label>
    <label>Borde, grosor(px), estilo, color: 
    <input type=\"text\" name=\"border\">
    </label>
    

    
    ");
    print ("<input type=\"submit\" value=\"Generar Tabla\"></form>");
}


function genTable($rows,$cols){
    // print("<p> Argumentos (4debugging): ".func_num_args()."</p>"); //Para hacer debugging


    print('<table style="');
    for ($i=2; $i < func_num_args(); $i++) { 
        print(' '.func_get_arg($i).' ');
    }
    print('"><tbody>');
    for ($i=0; $i < $rows; $i++) { 
        print('<tr>');
        for ($j=0; $j < $cols; $j++) { 
            print('<td></td>');
        }
        print('</tr>');
    }

    print('</tbody></table>');

}

function checkInputs(){
$arr=[];

if (!empty($_POST['width'])) {
    array_push($arr,"width:".$_POST['width']."px;");
}
else{
    array_push($arr,"width:60px;");
}

if (!empty($_POST['height'])) {
    array_push($arr,"height:".$_POST['height']."px;");
}
else{
    array_push($arr,"height:60px;");
}

if (!empty($_POST['color'])) {
    array_push($arr,"background:".$_POST['color'].";");
}
else{
    array_push($arr,"background:pink;");
}

if (!empty($_POST['border'])) {
    array_push($arr,"border:".$_POST['border'].";");
}
else{
    array_push($arr,"border: 3px dashed blue;");
}

return $arr;

}
























// <label>Palo: 
//     <select name=\"palo[]\" multiple>
//         <option value=\"oros.jpg\">Oros</option>
//         <option value=\"copas.jpg\">Copas</option>
//         <option value=\"espadas.jpg\">Espadas</option>
//         <option value=\"bastos.jpg\">Bastos</option>
//     </select>
//     </label>
    
//     <label>Número: 
//     <select name=\"num[]\" multiple>
//         <option value=\"1\">As</option>
//         <option value=\"2\">2</option>
//         <option value=\"3\">3</option>
//         <option value=\"4\">4</option>

//         <option value=\"5\">5</option>
//         <option value=\"6\">6</option>
//         <option value=\"7\">7</option>
//         <option value=\"8\">8</option>

//         <option value=\"9\">9</option>
//         <option value=\"10\">Sota</option>
//         <option value=\"11\">Caballo</option>
//         <option value=\"12\">Rey</option>
//     </select>
//     </label>
//     <label>Mano aleatoria: 
//     <input type=\"number\" name=\"mano\" max=48 min=1>
//     </label>