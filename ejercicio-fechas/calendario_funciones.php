<?php
function calendario_mensual($ano, $mes)
{
    if ($mes > 12 || $mes < 1) {
        throw new Exception("Error En el mes introducido", 1);

    }

$objcaption= new DateTime(''.$ano.'-'.$mes.'-01',new DateTimeZone('Europe/Madrid'));
$monthname=ucfirst(IntlDateFormatter::formatObject($objcaption,'MMMM YYYY','es'));
//date("F-Y", strtotime("1-" . $mes . "-" . $ano))
    $firstday = date("D", strtotime("1-" . $mes . "-" . $ano));
    $res = '';
    $firstday = getfirst($firstday);
   // $res .= '<h1>' . $firstday . '</h1>';
    $res .= "<table>";
    $res .= "<caption>" . $monthname . "</caption>";
    $res .= '<thead><tr>';
    $res .= '<th>L</th>';
    $res .= '<th>M</th>';
    $res .= '<th>X</th>';
    $res .= '<th>J</th>';
    $res .= '<th>V</th>';
    $res .= '<th>S</th>';
    $res .= '<th>D</th>';
    $res .= '</tr></thead>';
    $res .= '<tbody>';
    $days = $mes == 2 ? ($ano % 4 ? 28 : ($ano % 100 ? 29 : ($ano % 400 ? 28 : 29))) : (($mes - 1) % 7 % 2 ? 30 : 31);
    $res .= '<tr>';
    
    for ($i = 1; $i <= $days+$firstday; $i++) {
        if ($i % 7 == 1) {
            $res .= '</tr><tr>';
        }
        if ($i<=$firstday) {
            $res .= '<td></td>';
        }
        else{
        $res .= '<td>' . $i-$firstday . '</td>';
        }
    }
    $res .= '</tr>';
    $res .= '</tbody>';
    $res .= "</table>";
    return $res;
}

//================================================

function calendario_anual($ano)
{
    print ('<div class="diss">');
    print ('<table>');
    print ("<caption>Calendario " . $ano . "</caption>");

    print ('<tbody><tr>');
    for ($i = 1; $i < 13; $i++) {
        if ($i % 4 == 1) {
            print ('</tr><tr>');
        }
        print ('<td><div>' . calendario_mensual($ano, $i) . '</div></td>');
    }


    print ('</tr></tbody>');
    print ('</table>');
    print ('</div>');
}

function getfirst($day)
{
    switch ($day) {
        case 'Mon':
            return 0;
            
        case 'Tue':
            return 1;            
        case 'Wed':
            return 2;            
        case 'Thu':
            return 3;            
        case 'Fri':
            return 4;            
        case 'Sat':
            return 5;            
        case 'Sun':
            return 6;            

        default:
            return 0;
            
    }

}



function usarArrWalk($arr){
$ano=date("Y");
print('<div class="ej4">');
array_walk($arr,function($mes)use ($ano){
    print(calendario_mensual($ano, $mes));
});
print('</div>');
}