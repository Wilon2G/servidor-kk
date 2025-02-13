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

Route::get('/', [DashboardController::class,"index"])->name('dashboard');

Route::get('/login', [CustomerController::class,"index"])->name("login");

Route::get('/logout', [CustomerController::class,"logout"])->name("logout");

Route::post('/login/validation', [CustomerController::class,"validateUser"])->name("login.validate");

Route::get('/register', [CustomerController::class,"registerUser"])->name("register");

Route::get('/books', [BookController::class,"index"])->name("books");

Route::get('/frog', [GeneralController::class,"frog"])->name("secretFrog");

Route::get('/userBooks', [BookController::class,"userBooks"])->name("userBooks");

Route::get('/purchases', [BookController::class,"purchases"])->name("purchases");

Route::get('/rentBook/{id}', [BookController::class,"rent"])->name("rentBook");

/*
Métodos estáticos de la clase Route:
view() -->  Nos permite pintar una vista directamente saltándonos el controlador, recibe la ruta y la vista ('/ruta',"nombreDeLaVista").
            Si la ruta a la vista está en una carpeta dentro de views, no se utilizan barras en la ruta, se usan puntos.

get() --> Recibe la ruta y el controlador que utiliza ('/ruta/que/queremos, [controlador::class,"funcion"]')
post()
put()
delete()
patch()

=======================================================================

Plugins para Laravel:
- PHP Intelephense
- Laravel Blade Snippets
- Laravel Extension Pack

======================================================================

PASAR PARÁMETROS POR URL
Route::get('/example/{id}', [BookController::class,"function"])->name("example");
Route::get('/example/{id}', [BookController::class,"functionexample"])->name("example"); En este caso sería opcional

En la función del controlador accedemos:
public function functionexample($id="valorPorDefecto"){

return $id
}


*/
