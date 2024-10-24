<?php
function form(){
    print ("
    <form action=\"" . $_SERVER['PHP_SELF'] . "\" method=\"POST\">
    <label>Filas: 
    <input type=\"number\" name=\"rows\">
    </label>
    <label>Columnas: 
    <input type=\"number\" name=\"cols\">
    </label>

    
    ");
    print ("<input type=\"submit\" value=\"Generar Tabla\"></form>");
}


function genTable($rows,$cols){
    print('<table><tbody>');
    for ($i=0; $i < $rows; $i++) { 
        print('<tr>');
        for ($j=0; $j < $cols; $j++) { 
            print('<td></td>');
        }
        print('</tr>');
    }

    print('</tbody></table>');

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