
    <?php
    require "../vendor/autoload.php";
    use Philo\Blade\Blade;
    use Windwalker\Edge\Edge;
    use Windwalker\Edge\Loader\EdgeFileLoader;
    use Windwalker\Edge\Loader\EdgeStringLoader;

    $edge=new Edge(new EdgeStringLoader);

    $viewsPath = __DIR__ . '/../views';

    $loader = new EdgeFileLoader([$viewsPath]);
    $edge = new Edge($loader);
    //echo $edge->render('<h1>{{$title}}</h1>',array('title'=>'Hello World'));
    
    echo $edge->render('prueba', [
        'titulo' => 'Mi titulo',
        'encabezado' => 'Mi encabezado'
    ]);



