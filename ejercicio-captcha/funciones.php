<?php

function randString($n)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randstring = '';
    for ($i = 0; $i < $n; $i++) {
        $randstring =$randstring. $characters[rand(0, strlen($characters)-1)];
    }
    return $randstring;
}

function genImage($string){
    $font="./fonts/OpenSans-Regular.ttf";
    $background="./media/fondo.jpeg";
    $img=imagecreatefromjpeg($background);

    // $color=imagecolorallocate($img,0,0,0);
    // imagefttext($img,30,0,30,60,$color,$font,$string);

    for ($i=0; $i < strlen($string); $i++) { 
        $color=imagecolorallocate($img,random_int(100,255),random_int(100,255),random_int(100,255));
        imagefttext($img,100/strlen($string),random_int(-20,20),20+$i*35,60+random_int(-5,5),$color,$font, substr($string,$i,1));
    }


    ob_start();
    imagejpeg($img);
    $temp=ob_get_clean();

    return base64_encode($temp);
}

