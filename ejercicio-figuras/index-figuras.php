<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Figuras</title>
    <link type="text/css" rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    spl_autoload_register('classAutoLoader');
    session_start();


    $cuadrado = new Cuadrado(100, [0, 255, 0]);

    //print ($cuadrado);
    
    $triangle = new Triangulo(100, 100, [0, 255, 0]);

    //print ($triangle);
    
    $circulo = new Circulo(100, [255, 0, 0]);

    //print ($circulo);
    

    
    if (isset($_POST["continue"])) {
        $_SESSION["fig"]=$_POST["fig"];
        $_SESSION["color"] = $_POST["chosenColor"];
    } else {
        $_SESSION["fig"] = "sqr";
        $_SESSION["color"] = "#000000";
    }

    ?>
    <form class="config" action="#" method="POST">
        <label class="figure">Figura:
            <input type="radio" name="fig" value="sqr" <?php $_SESSION["fig"] === "sqr" ? print ("checked") : "" ?>>Cuadrado</input>
            <input type="radio" name="fig" value="trg" <?php $_SESSION["fig"] === "trg" ? print ("checked") : "" ?>>Triangulo</input>
            <input type="radio" name="fig" value="crl" <?php $_SESSION["fig"] === "crl" ? print ("checked") : "" ?>>Circulo</input>
        </label>
        <br>
        <label class="chosenColor">Color:
            <input type="color" name="chosenColor" value="<?php print ($_SESSION["color"]) ?>">
        </label>
        <br>
        <input class="continue" type="submit" name="continue" value="Continuar">
    </form>

    <?php
    //print($_POST["chosenColor"]);
    if (isset($_POST["continue"])) {
        showForm($_POST["fig"]);
    }
    ?>
    
</body>

</html>

<?php

function classAutoLoader($class)
{
    $class = strtolower($class);
    $classFile = $_SERVER['DOCUMENT_ROOT'] . '/servidor/clases/' . $class . '.php';
    if (is_file($classFile) && !class_exists($class))
        include $classFile;
}

function showForm($fig)
{
    print ("<form class=\"config\" action=\"#\" method=\"POST\">");
    if ($fig === "sqr") {
        print ("<lable>Lado del Cuadrado: <input type=\"number\" name=\"side\"></lable> ");
    }
    if ($fig === "trg") {
        print ("<lable>Base del Triángulo: <input type=\"number\" name=\"base\"></lable> ");
        print ("<lable>Altura del Triángulo: <input type=\"number\" name=\"heith\"></lable> ");
    }
    if ($fig === "crl") {
        print ("<lable>Radio del Cículo: <input type=\"number\" name=\"radio\"></lable> ");
    }

    print ("<br>
    <input type=\"submit\" name=\"Continuar\" value=\"Generar\">
    </form>");
}



?>