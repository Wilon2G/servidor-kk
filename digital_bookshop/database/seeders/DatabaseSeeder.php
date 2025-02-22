<?php

namespace Database\Seeders;

use App\Models\BorrowedBook;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

/**
 * Escribo esto aquí para no repetirme en cada seeder,
 * Todos los seeders se apoyan en sus respectivos modelos,
 * no he incluido un seeder de BookSale porque es innecesario ya que el modelo de Sale está preparado
 * para introducir datos automáticamente en BookSale.
 */

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            BookSeeder::class,
            CustomerSeeder::class,
            BorrowedBookSeeder::class,
            SaleSeeder::class,
        ]);

    }
}
