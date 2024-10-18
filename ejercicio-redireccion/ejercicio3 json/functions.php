<?php
function form($bol)
{
    $r = 'LogIn';
    if ($bol) {
        $r = 'Registrarse';
    }

    print ("
    <form action=\"" . $_SERVER['PHP_SELF'] . "\" method=\"POST\">
    <label>Usuario: 
    <input type=\"text\" name=\"username\" maxlength=\"30\" minlength=\"4\" required >
    </label>
    <br><br>
    <label>Contraseña: 
    <input type=\"password\" name=\"password\" maxlength=\"30\" minlength=\"4\" required >
    </label>
    <br><br>");
    if ($bol) {
        print ("<label>Nombre completo: 
    <input type=\"text\" name=\"name\" maxlength=\"30\" minlength=\"1\"  >
    </label>
    <br><br>
    <label>Apellidos: 
    <input type=\"text\" name=\"surname\" maxlength=\"30\" minlength=\"1\"  >
    </label>
    <br><br>
    <label>Teléfono: 
    <input type=\"tel\" name=\"tel\"   >
    </label>
    <br><br>
    <label>Dirección: 
    <input type=\"text\" name=\"address\"  maxlength=\"30\" minlength=\"4\" >
    </label>
    <br><br>
    
    ");

    }
    print ("<input type=\"submit\" value=\"" . $r . "\"></form>");

}

function filteruser($s)
{
    $s = explode(":", $s);
    return $s[0];
}

function checkAttempt($arr,$username, $password){

return array_key_exists($username,$arr)&&$arr[$username]==$password;


}