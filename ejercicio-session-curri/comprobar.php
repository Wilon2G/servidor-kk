<?php
include(__DIR__ . "/functions/funciones.php");

session_name("FormData");
session_start();


$vars=["nombre","apellidos","id","correo","tlfn","deporte","nacionalidad","idioma","nvling","sexo","fechan"];





for ($i=0; $i < sizeof($vars); $i++) { 
    $_SESSION[$vars[$i]]=checkInput($vars[$i]);
}

$id=$_SESSION["id"];

if (!checkId($id)) {
    $_SESSION["id"]="";
}

$errors=[];

for ($i=0; $i < sizeof($vars); $i++) { 
    if (checkError($_SESSION[$vars[$i]])) {
        $errors[$vars[$i]]="error";
    }
   
}




if (sizeof($errors)==0) {
    // print("<h1>kk<h1>");
    printBody();
}
else {

    
    $_SESSION["style"]=$errors;
    header("Location: curriForm.php");
}


// var_dump($dni);













