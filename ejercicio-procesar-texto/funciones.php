<?php

function remark($text){
    // if (isset($_POST['remark'])) {
    //     $pals = str_word_count($text,1);
    //     $palsremark=str_word_count($_POST['textomodder'],1);
    //     $div='<div class="ocultar">kk';
    //     foreach ($pals as $key => $pal) {
    //         if ( in_array($pal, $palsremark) ) {
    //             $div.= ' <mark>'.$pal.'</mark> ';
    //         }
    //         else {
    //             $div.= ' '.$pal.' ';
    //         }
    //     }


    //     $div=$div.'</div>';
    //     return $div;
    // }
    $markpal='<mark>'.$_POST['textomodder'].'</mark>';
    return '<div class="ocultar" id="divtramposo" onclick="occultDiv()">'.str_replace($_POST['textomodder'],$markpal,$text).'</div>';
}
function remove($text){
    if (isset($_POST['remove'])) {
        $text=str_replace($_POST['textomodder'],"",$text);
        return $text;
    }
}

function replace($text){
    if (isset($_POST['replace'])&&isset($_POST['replacetxt'])) {
        $text=str_replace($_POST['textomodder'],$_POST['replacetxt'],$text);
        return $text;
    }
    else {
        return $text;
    }
}

function countpal($text){
    if (isset($_POST['count'])) {
        return str_word_count($text);
    }
}

function countv($text){
    if (isset($_POST['countv'])) {
        
        return preg_match_all('/[aeiou]/i',$text,$matches);
    }
}

function lower($text){
    if (isset($_POST['lower'])) {
        return strtolower($text);
    }
}
function upper($text){
    if (isset($_POST['upper'])) {
        return strtoupper($text);
    }
}


function selectfun($text){
if (isset($_POST["remark"])) {
    return [$text,remark($text)];
}
if (isset($_POST["remove"])) {
    return [remove($text)];
}
if (isset($_POST["replace"])) {
    return [replace($text)];
}
if (isset($_POST["count"])) {
    return [$text,countpal($text)];
}
if (isset($_POST["countv"])) {
    return [$text,countv($text)];
}
if (isset($_POST["lower"])) {
    return [lower($text)];
}
if (isset($_POST["upper"])) {
    return [upper($text)];
}

return [$text];

}


function mostrarnum($num){
    
    if (isset($_POST["count"])) {
        return "<p>Hay ".$num." palabras</p>";
    }
    if (isset($_POST["countv"])) {
        return "<p>Hay ".$num." vocales</p>";    
    }
    if (isset($_POST["remark"])) {
        return $num;
    }
    return "err";

}






?>