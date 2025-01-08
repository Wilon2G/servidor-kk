<?php
header("content-type: image/jpeg");


//Elegimos el ancho y alto del captcha
$ancho = 120;
$alto = 50;

// $imagen=imagecreate(120,50);

//Colores
$imagen = imagecreatetruecolor($ancho, $alto);
$negro = imagecolorallocate($imagen, 0, 0, 0);
$gris = imagecolorallocate($imagen, 100, 100, 100);
$rgb[0] = rand(0, 255);
$rgb[1] = rand(0, 255);
$rgb[2] = rand(0, 255);

$colorAleatorio = imagecolorallocate($imagen, $rgb[0], $rgb[1], $rgb[2]);
$colorAleatorioInvertido = imagecolorallocate($imagen, 255 - $rgb[0], 255 - $rgb[1], 255 - $rgb[2]);

// //Fondo
imagefill($imagen, 0, 0, $colorAleatorio);

//Marco
imageline($imagen, 0, 0, $ancho, 0, $negro);
imageline($imagen, 0, 0, 0, $alto, $negro);
imageline($imagen, $ancho - 1, $alto - 1, 0, $alto - 1, $negro);
imageline($imagen, $ancho - 1, $alto - 1, $ancho - 1, 0, $negro);

// //Rejilla
imageline($imagen, 25, 0, 25, $alto, $gris);
imageline($imagen, 50, 0, 50, $alto, $gris);
imageline($imagen, 75, 0, 75, $alto, $gris);
imageline($imagen, 0, 13, $ancho, 13, $gris);
imageline($imagen, 0, 26, $ancho, 26, $gris);
imageline($imagen, 0, 39, $ancho, 39, $gris);

// //Texto aleatorio
$random = substr(str_replace("0", "", str_replace("O", "", strtoupper(md5(rand(9999, 99999))))), 0, 5);
//Fuente a utilizar
$ttf = "./fonts/OpenSans-Regular.ttf";
imagefttext($imagen, 20, rand(-10, 15), 17, 37, $colorAleatorioInvertido, $ttf, $random);

$fuente = 6;

$random = substr(str_replace("5", "", str_replace("O", "", strtoupper(md5(rand(9999, 99999))))), 0, 5);
//Escribir verticalmente
$x = 0;
$y = 45;
imagestringup($imagen, $fuente, $x, $y, $random, $colorAleatorioInvertido);

//Añadir ruido para que sea más ilegible
for ($i = 0; $i <= 777; $i++) {
    $randx = rand(0, 120);
    $randy = rand(0, 50);
    imagesetpixel($imagen, $randx, $randy, $colorAleatorioInvertido);
}

imagejpeg($imagen);
imagedestroy($imagen);
?>