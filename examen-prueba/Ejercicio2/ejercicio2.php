<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio2</title>
</head>

<body>
    <?php
    if (!isset($_COOKIE["statsMode"]) || !isset($_COOKIE["statsType"])) {
        header("location:./index.php");
    }
    $file = file_get_contents("./cambio.json");
    $cambio = json_decode($file, true);
    $currencys = array_keys($cambio);


    ?>
    <main>
        <h1>Ejercicio2</h1>
        <?php

        print ("<form action=\"" . $_SERVER['PHP_SELF'] . "\" method=\"POST\">
        <label>Importe: 
        <input type=\"number\" name=\"import\"></input>
        </label>
        <br/>
        <label>
        De:
        <select name=\"type1\">");
        foreach ($currencys as $currency) {
            print ("<option type=\"checkbox\" value=\"" . $currency . "\"  >" . $currency . "</option>");
        }

        print ("</select></label>
        <br/>
        <label> A: 
        <select name=\"type2\">");
        foreach ($currencys as $currency) {
            print ("<option type=\"checkbox\" value=\"" . $currency . "\"  >" . $currency . "</option>");
        }

        print("
        </select>
        </label>
        <br/>
        
        <input type=\"submit\" value=\"convertir\" />
        </form>
        ");

        ?>
    </main>
</body>

</html>