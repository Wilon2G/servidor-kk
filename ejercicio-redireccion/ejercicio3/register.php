<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style-main.css">
    <title>Register</title>
</head>

<body>
    <div class="opciones">
        <?php
        include(__DIR__ . "/functions.php");

        $file = file_get_contents("./datos.txt");
        $infousers = array_map('trim', explode("\n", $file));

        if (!isset($_POST['username'])&&!isset($_POST['password'])) {
            form(true);
        }
        else{
            $attempt=strtolower($_POST['username']).':'.$_POST['password'];
            $userattempt=strtolower($_POST['username']);
            
        }


        ?>

    </div>

</body>

</html>