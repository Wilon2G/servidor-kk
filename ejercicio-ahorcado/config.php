<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ahorcado</title>
</head>
<body>
    <header><h1>Ahorcado</h1></header>
    <main>
        <form action="./index-ahorcado.php" method="POST">
            <label>Player One:
            <input type="text" name="payerName" required minlength="2" maxlength="10" />
            </label>
            <label>Dificulty:
                <input type="radio" name="dif" value="1" checked>Easy</input>   //Siete intentos
                <input type="radio" name="dif" value="1.4" >Medium</input>        //Cinco intentos
                <input type="radio" name="dif" value="2.4" >Hard</input>          //Tres intentos
                <input type="radio" name="dif" value="7" >Really Hard</input>   //Un intento
            </label>

            <input type="submit" name="configIn" value="Jugar">
        </form>
    <?php

    
    ?>
    </main>
</body>
</html>
