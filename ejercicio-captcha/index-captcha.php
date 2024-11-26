<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h1>Captcha 1</h1>
    <img src="./generate-captcha.php">
    <br>
    <br>
    <h1>Captcha 2</h1>
    <?php
    include "./funciones.php";
    session_start();
    if (isset($_POST["strIn"])&&isset($_SESSION["captcha"])) {
        if ($_POST["strIn"]=== $_SESSION["captcha"]) {
            header("Location:welcome.html");
            exit;
        }
        else {
            print("<h1>Capcha incorrecto</h1>");
        }
    }

    $string = randString(1);
    $img = genImage($string);

    print ("<img src=\"data:image/jpeg;base64," . $img . "\" />");

    //var_dump($string);

    

    $_SESSION["captcha"]=$string;

    print ("<form action=\"" . $_SERVER['PHP_SELF'] . "\" method=\"POST\" >
    <lable>Text:
    <input type=\"text\" name=\"strIn\">
    </lable>

    <input type=\"submit\" value=\"submit\">

    </form>

    ");

    ?>
</body>

</html>