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

    for ($i=0; $i < sizeof($secretLetters); $i++) { 
    if ($secretLetters[$i][0]==$letterIn) {
        return true;
    }
}

    return false;
    
}




function addLetter($letterIn,$word){
    foreach ($word as $letter =>$i) {
        if (in_array($letterIn,$letter)) {
            $word[$i][1]=true;
        }
    }
return $word;
}