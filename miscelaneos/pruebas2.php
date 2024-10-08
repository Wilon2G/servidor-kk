<?php

$a = 2;
$b = 5;

function sum()
{
    global $a, $b;
    return $a + $b;
} 

echo sum();
echo "<br>";
echo "hola mundo";
echo "<br>";
echo PHP_VERSION;
