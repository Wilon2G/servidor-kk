
    <?php
    require "../vendor/autoload.php";
    use Daw2\AppLibroBlade\Book;
    use Windwalker\Edge\Edge;
    use Windwalker\Edge\Loader\EdgeFileLoader;
    use Windwalker\Edge\Loader\EdgeStringLoader;
    session_start();
    $edge=new Edge(new EdgeStringLoader);
    $viewsPath = __DIR__ . '/../views';
    $loader = new EdgeFileLoader([$viewsPath]);
    $edge = new Edge($loader);


    

    if (!isset($_SESSION["logedUser"])) {
        echo $edge->render('libros', [
            'titulo' => 'Mi titulo',
            'encabezado'=>'Todos los Libros:',
            'libros' => Book::allBooks()
        ]);
        
    }
    else {
        echo $edge->render('login', [
            'titulo' => 'Login',
            'encabezado'=>'Inicio de sesión',
        ]);
    }


    
    



