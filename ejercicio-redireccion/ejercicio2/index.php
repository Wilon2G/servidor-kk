<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style-main.css">
</head>
<body>
    <div class="opciones">
        <h3>Usuarios y contraseñas para poder probar</h3>
    <?php
    include(__DIR__."/functions.php");
    $file=file_get_contents("./datos.txt");
    $infousers=array_map('trim',explode("\n", $file)) ;
    foreach ($infousers as $key => $user) {
        print( "<p>".$user."</p>");
        // print( "<br>");
    }

    if (!isset($_POST['username'])&&!isset($_POST['password'])) {
        form();
    }
    else{
        $attempt=strtolower($_POST['username']).':'.$_POST['password'];
        
        print("<p>".$attempt."</p>");
        if (in_array($attempt, $infousers)) {
            header("Location: verdatos.php");
        }
        else {
            $username=$_POST['username'];
            header("Location: error.php?username=".urlencode($username));
        }
    }
    

    ?>
    


    </div>
</body>
</html>