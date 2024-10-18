<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style-main.css">
    <title>Top secret</title>
</head>
<body>
    <div class="opciones" id="top-secret">
    <h1>Bienvenido!</h1>
<h3>Ahora puede acceder a todos los datos secretos</h3>
<button id="froggo">Pulse aquí para revelar secretos</button>


    </div>

    <script>
        const btn=document.getElementById('froggo');
        const divb=document.getElementById('top-secret');
        btn.addEventListener('click',showfrog);

        function showfrog(){
            const frog=document.createElement('img');
            frog.setAttribute('src','./media/frog_top_secret.jpg');
            divb.appendChild(frog);
        }
    </script>
    
</body>
</html>