<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield("titulo")</title>
</head>
<body>
    <header>
        <h1>
        @yield("encabezado")
        </h1>
    </header>
    <main>
        @yield("contenido")
    </main>
</body>
</html>