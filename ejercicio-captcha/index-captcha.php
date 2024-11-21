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
    $string=randString(5);
    //print($string);
    $img=genImage($string);
    
    print("<img src=\"data:image/jpeg;base64,".$img."\" />");
    ?>
</body>
</html>