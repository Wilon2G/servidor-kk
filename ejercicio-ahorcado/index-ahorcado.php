<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    include "./functions.php";
    session_name("Game");
    session_start();


    if (!isset($_POST['configIn'])) {
        header("location: ./config.php");
    }
    else {
        $_SESSION=$_POST;
        $_SESSION["secretWord"]=pickRandomWord();
        $_SESSION["lettersLeft"]=str_split("QWERTYUIOPASDFGHJKLZXCVBNM");
        $_SESSION["errors"]=0;
        
        header("location: ./game.php");
    }



    ?>
</body>

</html>