<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sale;
use App\Models\Book;

class SaleFactory extends Seeder
{
    public function run()
    {
        // Crear 10 ventas con un cliente aleatorio sin faker porque obv no tiene sentido usar faker aquí
        Sale::factory(10)->create()->each(function ($sale) {
            // Obtener entre 1 y 3 libros aleatorios
            $books = Book::inRandomOrder()->limit(rand(1, 3))->get();

            // Asignar libros a la venta con cantidades aleatorias
            foreach ($books as $book) {
                $sale->books()->attach($book->id, ['amount' => rand(1, 5)]);
            }
        });
    }
}
