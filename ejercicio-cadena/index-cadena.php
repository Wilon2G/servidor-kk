<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$cadena="bogota montar tapizar ciclismo montaña pepito reciclar";
$matches;
$pattern='/(mo)/';
print('<p>Vamos a buscar en la cadena: '.$cadena.'</p>');
print('<p>Los valores: '.$pattern.'</p>');
preg_match(pattern: $pattern, subject: $cadena, matches: $matches, flags: PREG_OFFSET_CAPTURE);
print("<p>cntrl</p>");
foreach ($matches as $key => $value) {
    print('<p>Cadena: '.$value[0].' en posición: '.$value[1].'</p>');
}
print_r($matches);
?>
    
</body>
</html>

