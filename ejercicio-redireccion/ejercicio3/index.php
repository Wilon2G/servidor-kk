<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" href="style-main.css">
</head>
<body>
    <div class="opciones">
        <h3>Usuarios y contraseñas para poder probar</h3>
        <p>Solo usar si ya estás registrado pero se te ha olvidado tu usuario o contraseña :)</p>
        <button id="showinfo">Top secret</button>
    <?php
    include(__DIR__."/functions.php");
    $file=file_get_contents("./datos.txt");
    $infousers=array_map('trim',explode("\n", $file)) ;
    print('<div id="userinfo" hidden>');
    foreach ($infousers as $key => $user) {
        print( "<p>".$user."</p>");
        // print( "<br>");
    }
    print('</div>');
    if (!isset($_POST['username'])&&!isset($_POST['password'])) {
        form(false);
    }
    else{
        $attempt=strtolower($_POST['username']).':'.$_POST['password'];
        
        print("<p>".$attempt."</p>");
        if (in_array($attempt, $infousers)) {
            header("Location: verdatos.php");
        }
        else {
            $username=$_POST['username'];
            header("Location: error.php?username=$username");
        }
    }
    

    ?>
    <script>
        const info=document.getElementById("userinfo");
        const btn=document.getElementById("showinfo");
        btn.addEventListener('click',showinfo);
        function showinfo(){
            if (info.hasAttribute('hidden')) {
                info.removeAttribute('hidden');
            }else{
                info.setAttribute('hidden','');
            }
            
        }
    </script>
    


    </div>
</body>
</html>