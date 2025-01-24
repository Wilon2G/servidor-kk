<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>kk</h1>
    <?php
    require "../vendor/autoload.php";
    use Philo\Blade\Blade;
    $views="../views";
    $cache="../cache";
    $blade= new Blade($views,$cache);
    echo $blade->make("prueba",[
        "titulo" => "Mi titulo",
        "encabezado" => "Mi encabezado"
    ])->render();
    ?>
</body>
</html>