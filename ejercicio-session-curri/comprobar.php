<?php
include(__DIR__ . "/functions/funciones.php");

session_name("FormData");
session_start();





$_SESSION=$_POST;

if (!isset($_POST["deporte"])) {
    $_SESSION["deporte"]="error";
}

checkInputs();


$id=$_SESSION["id"];

if (checkId($id)) {
    // print("<h1>kk<h1>");
    printBody();
}
else {
    $_SESSION["id"]="";
    $_SESSION["style"]=[];
    header("Location: curriForm.php");
}


// var_dump($dni);













