<?php
function classAutoLoader($class)
{
    $class = strtolower($class);
    $classFile = $_SERVER['DOCUMENT_ROOT'] . '/servidor/clases/' . $class . '.php';
    if (is_file($classFile) && !class_exists($class))
        include $classFile;
}

function hexadecimalARgb($hexadecimal)
{
    list($r, $g, $b) = sscanf($hexadecimal, "#%02x%02x%02x");
    return [$r, $g, $b];
}

function showForm($fig)
{
    print ("<form class=\"config\" action=\"#\" method=\"POST\">");
    if ($fig === "sqr") {
        print ("<lable>Lado del Cuadrado: <input type=\"number\" name=\"side\" required></lable> ");
    }
    if ($fig === "trg") {
        print ("<lable>Base del Triángulo: <input type=\"number\" name=\"base\" required></lable> ");
        print ("<lable>Altura del Triángulo: <input type=\"number\" name=\"heigth\" required></lable> ");
        print ("<lable>Rectangulo: <input type=\"checkbox\" name=\"rectangulo\" ></lable> ");

    }
    if ($fig === "crl") {
        print ("<lable>Radio del Cículo: <input type=\"number\" name=\"radio\" required></lable> ");
    }

    print ("<label class=\"chosenColor\">Color:
            <input type=\"color\" name=\"chosenColor\">
            </label>
            <input type=\"hidden\" name=\"figType\" value=\"".$fig."\" />
        ");

    print ("<br>
    <input type=\"submit\" name=\"generate\" value=\"Generar\">
    </form>");
}

function generateFigure(){
    spl_autoload_register('classAutoLoader');

    $img="error";
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

    return ($img);
}

