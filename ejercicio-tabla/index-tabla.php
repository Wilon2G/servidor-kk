<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio Tabla</title>
    <link rel="stylesheet" href="style-main.css">
</head>

<body>
    <div class="opciones">
        <h1>Tabla</h1>
        <?php
        include('./functions.php');
        form();
        print('<div class="content">');
            if (!empty($_POST['rows'])&&!empty($_POST['cols'])) {
                genTable($_POST['rows'],$_POST['cols']);
            }
            print('</div>');
        ?>
    </div>

</body>

</html>