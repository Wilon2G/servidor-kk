<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="style.css">
    <title>Game</title>
</head>




<body>
    <header>

    </header>

    <main>

        <?php
        include "./functions.php";
        session_name("Game");
        session_start();

        



        if (isset($_GET["letter"])) {

            //unset($_SESSION["lettersLeft"][array_keys($_SESSION["lettersLeft"],$_GET["letter"])]);
            $_SESSION["lettersLeft"]=array_diff($_SESSION["lettersLeft"], array($_GET["letter"]));
            //array_search()

            
            if (letterInWord($_GET["letter"],$_SESSION["secretWord"])) {
                print("<h1>Letra: ".$_GET["letter"]."  Existe en palabra</h1>");

                for ($i=0; $i < sizeof($_SESSION["secretWord"]); $i++) { 
                    if (in_array($_GET["letter"],$_SESSION["secretWord"][$i])) {
                        $_SESSION["secretWord"][$i][1]=true;
                    }
                }
                
            }
            else {
                $_SESSION["errors"]++;
                print("<h1>Letra: ".$_GET["letter"]." no está en la palabra</h1>");
            }
            print("<h2>Número de errores: ".$_SESSION["errors"]."</h2>");
           
        }

        $secretWord = $_SESSION["secretWord"];

        $lettersLeft = $_SESSION["lettersLeft"];

        //var_dump($secretWord);
        //var_dump($_SESSION["lettersLeft"]);
        ?>

        <div class="secretWord">

            <?php
            //Pintamos la palabra
            for ($i = 0; $i < sizeof($secretWord); $i++) {
                print ("<div class=\"letterBox\">" . ($secretWord[$i][1] === true ? $secretWord[$i][0] : "") . "</div>");
            }

            ?>

        </div>



        <div class="keyboard">


            <div class="lettersLeft">

                <?php

                paintLettersLeft($lettersLeft);

                ?>

            </div>

        </div>

    </main>

</body>

</html>