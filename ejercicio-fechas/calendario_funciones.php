<?php
function calendario_mensual($año,$mes) {
    if ($mes>12||$mes<1) {
        throw new Exception("Error En el mes introducido", 1);
        
    }

    print("<table>");
    print("<caption>".date("F-Y",strtotime("1-".$mes."-".$año))."</caption>");
print('<thead><tr>');
print('<th>L</th>');
print('<th>M</th>');
print('<th>X</th>');
print('<th>J</th>');
print('<th>V</th>');
print('<th>S</th>');
print('<th>D</th>');
print('</tr></thead>');

    print("</table>");


}