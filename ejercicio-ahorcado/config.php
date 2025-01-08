<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ahorcado</title>
    <link type="text/css" rel="stylesheet" href="style.css">
</head>
<body>
    <header><h1>Ahorcado</h1></header>
    <main>
        <form class="config" action="./index-ahorcado.php" method="POST">
            <label>Player One:
            <input type="text" name="payerName" required minlength="2" maxlength="10" />
            </label>
            <label class="difLevel">Dificulty:
                <input type="radio" name="dif" value="1" checked>Easy: Seven trys</input>   
                <input type="radio" name="dif" value="1.4" >Medium: Five trys</input>        
                <input type="radio" name="dif" value="2.4" >Hard: Three trys</input>         
                <input type="radio" name="dif" value="7" >Really Hard: Only one try</input>   
            </label>

            <input type="submit" name="configIn" value="Jugar">
        </form>
    <?php

    
    ?>
    </main>
</body>
</html>
