<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php
    $username=$_GET['username'];
    print('<h1>Error, usuario "'.$username.'" no está registrado</h1>');
    print('<p>Volverá al formulario en 5 segundos</p>');
    header('Refresh:5 ; URL=index.php');
    ?>
</body>
</html>