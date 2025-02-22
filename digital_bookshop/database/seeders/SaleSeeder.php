<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sale;
use App\Models\Book;

class SaleSeeder extends Seeder
{
    public function run()
    {
        // Crear 10 ventas con un cliente aleatorio sin faker porque obv no tiene sentido usar faker
        //Aquí hacemos cosas interesantes, creamos con el factory varias ventas y según las creamos
        //tenemos una función que las recibe y les asigna unos libros aleatorios
        Sale::factory(5)->create()->each(function ($sale) {
            // Obtener entre 1 y 3 libros aleatorios
            $books = Book::inRandomOrder()->limit(rand(1, 3))->get();

            // Asignar libros a la venta con cantidades aleatorias
            foreach ($books as $book) {
                $sale->books()->attach($book->id, ['amount' => rand(1, 5)]);
            }
        });
    }
}
