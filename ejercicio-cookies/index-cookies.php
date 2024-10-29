<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    setcookie('Fecha',date('Y-m-d H:i:s'),time()+3600);
    setcookie('preferencias[idioma]','español');
    setcookie('preferencias[fondo]','rojo');
    
    
    
    
    ?>
    <a href="./ver-cookies.php">ver cookies</a>
</body>
</html>