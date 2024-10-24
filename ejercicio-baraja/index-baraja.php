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

        
        if (isset($_POST['mano'])&&!empty($_POST['mano'])) {
            if (isset($_POST['sorted'])) {
                showHand($_POST['mano'],true);
            }else {
                showHand($_POST['mano'],false);
            }
            
        }
        else {
            showBaraja(isset($_POST['palo'])?$_POST['palo']:null,isset($_POST['num'])?$_POST['num']:null);
        }
        
        
        ?>
    </div>
    
</body>
</html>