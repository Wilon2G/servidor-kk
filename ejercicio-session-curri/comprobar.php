<?php
include(__DIR__ . "/functions/funciones.php");

session_name("FormData");
session_start();

$_SESSION=$_POST;


$id=$_SESSION["id"];

if (checkId($id)) {
    print("<h1>kk<h1>");
}
else {
    $_SESSION["id"]="";
    header("Location: curriForm.php");
}


var_dump($dni);













