<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style-main.css">
    <title>error</title>
</head>
<body>
    <div class="opciones">
    <?php
    $username=$_GET['username'];
    print('<h1>Error, usuario "'.$username.'" no está registrado</h1>');
    print("<a href=\"./index.php\"><button>Reintentar</button></a>");
    print("<a href=\"./register.php\"><button>Registrarse</button></a>");
    ?>
    </div>
</body>
</html>
<!-- 
print("<a href=\"http://pruebas/ejercicio-dni/index-dni.php\"><button>Volver</button></a>"); -->