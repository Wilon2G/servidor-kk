<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen-prueba</title>
</head>

<body>
    <?php
    if (isset($_GET["ejer"])) {
        switch ($_GET["ejer"]) {
            case 2:
                header("location:./Ejercicio2");
                break;
            case 3:
                header("location:./Ejercicio3");
                break;
            case 4:
                header("location:./Ejercicio4");
                break;

            default:
                break;
        }
    }
    ?>
    <a href="./Ejercicio2">Ejercicio 2</a>
    <br>
    <a href="./Ejercicio3">Ejercicio 3</a>
    <br>
    <a href="./Ejercicio4">Ejercicio 4</a>
</body>

</html>