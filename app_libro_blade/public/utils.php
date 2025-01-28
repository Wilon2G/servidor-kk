<?
require "../vendor/autoload.php";
use Daw2\AppLibroBlade\DBconnection;

$conObj = new DBconnection();
$con=$conObj->getConnect();

function allBooks(){
    global $con;
    
}