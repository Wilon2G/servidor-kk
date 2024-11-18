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

        if (isset($_GET["retry"])) {
            resetSession();
        }




        if (isset($_GET["letter"])) {
            if (letterInWord($_GET["letter"], $_SESSION["secretWord"])) {
                for ($i = 0; $i < sizeof($_SESSION["secretWord"]); $i++) {
                    if (in_array($_GET["letter"], $_SESSION["secretWord"][$i])) {
                        $_SESSION["secretWord"][$i][1] = true;
                    }
                }
            } else {
                if (in_array($_GET["letter"], $_SESSION["lettersLeft"])) {
                    $_SESSION["errors"] = $_SESSION["errors"] + $_SESSION["dif"];
                    if ($_SESSION["errors"] > 8) {
                        $_SESSION["errors"] = 8;
                    }
                }
            }
            $_SESSION["lettersLeft"] = array_diff($_SESSION["lettersLeft"], array($_GET["letter"]));
        }
        $secretWord = $_SESSION["secretWord"];
        $lettersLeft = $_SESSION["lettersLeft"];
        ?>





        <div class="secretWord">
            <?php
            //Pintamos la palabra
            paintWord($secretWord);
            ?>
        </div>



        <div class="keyboard" style=<?php (round($_SESSION["errors"]) < 8 | calculateWin($secretWord)) ? print ("") : print ("display:none") ?>>
            <div class="lettersLeft">
                <?php
                paintLettersLeft($lettersLeft);
                ?>
            </div>
        </div>



        <div class="endGame" style=<?php round($_SESSION["errors"]) >= 8 || calculateWin($secretWord) ? print ("") : print ("display:none") ?>>
            <h1>Game Over</h1>
            <?php
            if (calculateWin($secretWord)) {
                print ("<h1>You Win!</h1>");
            } else {
                print ("<h1>You Lose</h1>");
            }
            print ("<a href=\"" . $_SERVER['PHP_SELF'] . "?retry=retry" . "\"><button>Play again</button></a>");
            print ("<a href=\"./config.php\"><button>Settings</button></a>");
            ?>


        </div>




        <div class="playerInfo">
            <?php
            print ("<img src=\"./media/hangman" . (round($_SESSION["errors"])) . ".png\" />")
            ?>
        </div>


    </main>

</body>

</html>