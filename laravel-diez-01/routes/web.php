<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Para ejecutar en comando hacemos cd a la carpeta y ejecutamos php artisan serve

Route::get('/libros/{accion}/{objeto}', function ($accion,$objeto=null) {
    if ($objeto) {
        # code...
    }
    return "Estamos en la vista de $accion";
});


Route::get('/kk', function () {
    return "<h1>KKKKKK</h1>";
});