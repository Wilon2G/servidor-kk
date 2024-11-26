<?php

function randString($n)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randstring = '';
    for ($i = 0; $i < $n; $i++) {
        $randstring = $randstring . $characters[rand(0, strlen($characters) - 1)];
    }
    return $randstring;
}

function genImage($string)
{
    $font = "./fonts/OpenSans-Regular.ttf";
    $background = "./media/fondo.jpeg";
    $img = imagecreatefromjpeg($background);

    // $color=imagecolorallocate($img,0,0,0);
    // imagefttext($img,30,0,30,60,$color,$font,$string);

$size=40-((strlen($string))*(imagesx($img))/100);
    for ($i = 0; $i < strlen($string); $i++) {
        $color = imagecolorallocate($img, random_int(100, 255), random_int(100, 255), random_int(100, 255));
        imagefttext($img, $size , 0, round(((((20-strlen($string))*imagesx($img)/100)) + ($i *($size )) )), round((imagesy($img)/2)+($size/2)) , $color, $font, substr($string, $i, 1));
    }
//random_int(-20, 20) + random_int(-5, 5)
    //Color para el ruido y rejilla
    $invertedColor = imagecolorallocate($img, 255 - random_int(0, 100), 255 - random_int(0, 100), 255 - random_int(0, 100));

    //Angulo de la rejilla:
    $angle = rand(-20, 20);
    imageline($img, 25-$angle, 0, 25+$angle, 100, $invertedColor);
    imageline($img, 50-$angle, 0, 50+$angle, 100, $invertedColor);
    imageline($img, 75-$angle, 0, 75+$angle, 100, $invertedColor);
    imageline($img, 100-$angle, 0, 100+$angle, 100, $invertedColor);
    imageline($img, 125-$angle, 0, 125+$angle, 100, $invertedColor);
    imageline($img, 150-$angle, 0, 150+$angle, 100, $invertedColor);
    imageline($img, 175-$angle, 0, 175+$angle, 100, $invertedColor);
    

    //Ruido
    for ($i = 0; $i <= 777; $i++) {
        $randx = rand(0, 200);
        $randy = rand(0, 100);
        imagesetpixel($img, $randx, $randy, $invertedColor);
    }


    ob_start();
    imagejpeg($img);
    $temp = ob_get_clean();
    imagedestroy($img);

    return base64_encode($temp);
}

/*
XN / ANCHOTOTAL


*/

