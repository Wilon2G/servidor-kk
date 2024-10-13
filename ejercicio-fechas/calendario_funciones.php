<?php
function calendario_mensual($ano,$mes) {
    if ($mes>12||$mes<1) {
        throw new Exception("Error En el mes introducido", 1);
        
    }
$res='';
    $res.="<table>";
    $res.="<caption>".date("F-Y",strtotime("1-".$mes."-".$ano))."</caption>";
$res.='<thead><tr>';
$res.='<th>L</th>';
$res.='<th>M</th>';
$res.='<th>X</th>';
$res.='<th>J</th>';
$res.='<th>V</th>';
$res.='<th>S</th>';
$res.='<th>D</th>';
$res.='</tr></thead>';
$res.='<tbody>';
$days=$mes == 2 ? ($ano % 4 ? 28 : ($ano % 100 ? 29 : ($ano % 400 ? 28 : 29))) : (($mes - 1) % 7 % 2 ? 30 : 31);
$res.='<tr>';
for ($i=1; $i <= $days; $i++) { 
    if ($i%7==1) {
        $res.='</tr><tr>';
    }
    $res.='<td>'.$i.'</td>';
}
$res.='</tr>';
$res.='</tbody>';
    $res.="</table>";
    return $res;
}

//================================================

function calendario_anual($ano){
print('<div class="diss">');
print('<table>');
print("<caption>Calendario ".$ano."</caption>");

print('<tbody><tr>');
for ($i=1; $i < 13; $i++) { 
    if ($i%4==1) {
        print('</tr><tr>');
    }
    print('<td><div>'.calendario_mensual($ano,$i).'</div></td>');
}


print('</tr></tbody>');
print('</table>');
print('</div>');
}