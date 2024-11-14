<?php

$words=["AEROPUERTO","ORDENADOR","MONITOR","ELEFANTE","CABEZA","MOCHILA"];

function pickRandomWord(){
    global $words;

    $selectedWord=str_split($words[array_rand($words,1)]) ;

    $secretWord=[];

for ($i=0; $i <sizeof($selectedWord) ; $i++) { 
    $secretWord[$i]=[$selectedWord[$i],false];
}

    return $secretWord;
}


function paintLettersLeft($lettersLeft){

    foreach ($lettersLeft as $letter) {
        print("<div class=\"letterButton\"><a href=\"".$_SERVER['PHP_SELF']."?letter=".$letter.""."\"><button>".$letter."</button></a></div>");
    }

}

function letterInWord($letterIn,$secretLetters){

    $inWord=false;

    foreach ($secretLetters as $letter) {
        if ($inWord===false) {
            $inWord=array_search($letterIn,$letter);
            
        }
        else {
            return true;
        }
        
        
    }

    return false;
    
}