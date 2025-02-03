<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GeneralController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
/*
Para devolver una vista directamente podemos poner una función:
Route::get('/', function(){
    return view('logInForm');
});
*/

Route::get('/', [DashboardController::class,"index"]);

Route::get('/libros', [BookController::class,"index"]);


/*
Métodos estáticos de la clase Route:
view() -->  Nos permite pintar una vista directamente saltándonos el controlador, recibe la ruta y la vista ('/ruta',"nombreDeLaVista").
            Si la ruta a la vista está en una carpeta dentro de views, no se utilizan barras en la ruta, se usan puntos.

get() --> Recibe la ruta y el controlador que utiliza ('/ruta/que/queremos, [controlador::class,"funcion"]')
post()
put()
delete()
patch()

Plugins para Laravel:
- PHP Intelephense
- Laravel Blade Snippets
- Laravel Extension Pack

*/
