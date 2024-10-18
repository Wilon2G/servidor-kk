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
        <h1>Regístrate</h1>
        <?php
        include(__DIR__ . "/functions.php");

        $file = file_get_contents("./datos.json");
        $infousers = json_decode($file,true);
        
        // foreach ($solousers as $key => $value) {
        //     print("<p>".$value."</p>");
        // }
        
        if (!isset($_POST['username']) && !isset($_POST['password'])) {
            form(true);
        } else {
            
            $userattempt = strtolower($_POST['username']);
            $passwordattempt = strtolower($_POST['password']);
            
            if (!array_key_exists($userattempt,$infousers)) {
                print ("<h1>Usuario registrado</h1>");
                $infousers[$userattempt]=$passwordattempt;
                file_put_contents("./datos.json",json_encode($infousers));
                print("Se te va a redirigir al inicio en 5 segundos");
                header('Refresh:5 ; URL=index.php');
            }
            else{
                print("<h3>Error, el nombre de usuario: ".$userattempt." ya está siendo utilizado, por favor, escoja otro</h3>");
                form(true);
            }


        }


        ?>

    </div>

</body>

</html>