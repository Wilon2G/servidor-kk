<?php
function form($bol){
    $r='LogIn';
    if ($bol) {
        $r='Register';
    }
    
    print("
    <form action=\"" . $_SERVER['PHP_SELF'] . "\" method=\"POST\">
    <label>Usuario: 
    <input type=\"text\" name=\"username\" maxlength=\"30\" minlength=\"1\" required >
    </label>
    <br><br>
    <label>Contraseña: 
    <input type=\"password\" name=\"password\" maxlength=\"30\" minlength=\"1\" required >
    </label>
    <br><br>
    <input type=\"submit\" value=\"".$r."\">
    </form>
    ");
}