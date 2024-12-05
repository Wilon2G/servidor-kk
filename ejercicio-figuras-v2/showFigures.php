<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Figuras</title>
</head>

<body>

    <?php
    include "./functions.php";
    spl_autoload_register('classAutoLoader');

    $img;
    $color = hexadecimalARgb($_POST["chosenColor"]);


    if ($_POST["figType"] == "sqr") {
        $img = new Cuadrado($_POST["side"], $color);
    }

    if ($_POST["figType"] == "trg") {
        if (isset($_POST["rectangulo"])) {
            $img = new Triangulo($_POST["base"], $_POST["heigth"], true, $color);
        } else {
            $img = new Triangulo($_POST["base"], $_POST["heigth"], false, $color);

        }
    }

    if ($_POST["figType"] == "crl") {
        $img = new Circulo($_POST["radio"], $color);
    }

    print ($img);


    ?>
    <a href="./index.php"><button>Volver</button></a>

</body>

</html>