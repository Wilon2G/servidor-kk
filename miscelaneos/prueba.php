<?php

$a = 9;
$b = 10;

for ($i = 0; $i < $a; $i++) {
    $b = $b + 1;
}


echo "hola mundo " . $a + $b;
echo "<br>";
var_dump(is_int($a));
echo "<br>";
echo "Con \\n";
echo "<br>";
echo "---------------------------------------------------------------------------------";
echo "<br>";
echo "<ul>\n 
    <li>1º DAW</li>\n 
    <li>2º DAW</li>\n 
    <li>1º ASIR</li>\n 
    <li>2º ASIR</li>\n 
    <li>1º DAM</li>\n 
    <li>2º DAM</li>\n 
</ul>";

echo "<br>";
echo "Sin \\n \n";
echo "<br>";
echo "---------------------------------------------------------------------------------";
echo "<br>";
echo "<ul><li>1º DAW</li> <li>2º DAW</li><li>1º ASIR</li><li>2º ASIR</li><li>1º DAM</li><li>2º DAM</li></ul>";

?>