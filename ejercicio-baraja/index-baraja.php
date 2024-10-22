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
        <?php 
        include('./funciones_php.php');
        
        form();

        if (isset($_POST['sorted'])) {
            sortBaraja();
        }else {
            barajar();
        }

        
        
        showBaraja(isset($_POST['palo'])?$_POST['palo']:0,isset($_POST['num'])?$_POST['num']:0);
        
        ?>
    </div>
    
</body>
</html>