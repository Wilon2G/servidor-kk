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
    include "./functions.php";
    spl_autoload_register('classAutoLoader');
    session_start();

    if (!isset($_SESSION["figures"])) {
        $_SESSION["figures"]=[];
    }


    //var_dump($_POST);

    $fig="";
    if (isset($_POST["generate"])) {
        $fig=$_POST["figType"];
    }
    if (isset($_POST["continue"])) {
        $fig=$_POST["fig"];
    }
    

    ?>
    <form class="config" action="#" method="POST">
        <label class="figure">Figura:
            <input type="radio" name="fig" value="sqr" <?php $fig=="sqr"||$fig==""?print("checked"):"" ?> >Cuadrado</input>
            <input type="radio" name="fig" value="trg" <?php $fig=="trg"?print("checked"):"" ?> >Triangulo</input>
            <input type="radio" name="fig" value="crl" <?php $fig=="crl"?print("checked"):"" ?> >Circulo</input>
        </label>
        <br>
        
        <input class="continue" type="submit" name="continue" value="Continuar">
    </form>

    <?php
    //print($_POST["chosenColor"]);
    if (isset($_POST["continue"])) {
        showForm($_POST["fig"]);
    }

    if (isset($_POST["generate"])) {
        if ($_POST["generate"]=="Generar") {
            array_push($_SESSION["figures"],generateFigure());
        //var_dump($_SESSION["figures"]);
        
        }
    }

    print("<div class=\"playGround\">");
    for ($i=0; $i < sizeof($_SESSION["figures"]); $i++) { 
        print("<div class=\"fig\">");
        print($_SESSION["figures"][$i]);
        print("</div>");

    }
    print("</div>");

    ?>
    
    
</body>

</html>

