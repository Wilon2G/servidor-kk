<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Insertar libros
        DB::table('books')->insert([
            ['id' => 1, 'isbn' => '978-3-16-1484', 'title' => 'Harry Potter y la piedra filosofal', 'author' => 'J. K. Rowling', 'stock' => 5, 'price' => 15.99],
            ['id' => 2, 'isbn' => '978-4-16-1484', 'title' => 'La sombre del viento', 'author' => 'Carlos Ruiz Zafón', 'stock' => 5, 'price' => 19.99],
            ['id' => 3, 'isbn' => '978-5-16-1484', 'title' => 'Don Quijote de la Mancha', 'author' => 'Miguel de Cervantes', 'stock' => 5, 'price' => 9.99],
            ['id' => 4, 'isbn' => '978-6-16-1484', 'title' => 'Drácula', 'author' => 'Bram Stoker', 'stock' => 5, 'price' => 15.99],
            ['id' => 5, 'isbn' => '978-7-16-1484', 'title' => 'Frankenstein', 'author' => 'Mary Shelley', 'stock' => 5, 'price' => 15.99],
            ['id' => 6, 'isbn' => '978-8-16-1484', 'title' => 'Historia de dos ciudades', 'author' => 'Charles Dickens', 'stock' => 5, 'price' => 9.99],
            ['id' => 7, 'isbn' => '978-9-16-1484', 'title' => 'Las aventuras de Alicia en el país de las maravillas', 'author' => 'Lewis Carroll', 'stock' => 5, 'price' => 15.99],
            ['id' => 8, 'isbn' => '978-2-12-1484', 'title' => 'El león, la bruja y el armario', 'author' => 'C. S. Lewis', 'stock' => 5, 'price' => 15.99],
            ['id' => 9, 'isbn' => '978-3-16-7484', 'title' => 'El principito', 'author' => 'Antoine de Saint-Exupéry', 'stock' => 5, 'price' => 9.99],
            ['id' => 10, 'isbn' => '958-3-16-1484', 'title' => 'El guardián entre el centeno', 'author' => 'J. D. Salinger', 'stock' => 5, 'price' => 9.99],
            ['id' => 11, 'isbn' => '998-3-16-1484', 'title' => 'El alquimista', 'author' => 'Paulo Coelho', 'stock' => 5, 'price' => 5.99],
            ['id' => 12, 'isbn' => '973-6-18-1489', 'title' => 'El nombre de la rosa', 'author' => 'Umberto Eco', 'stock' => 5, 'price' => 5.99],
            ['id' => 13, 'isbn' => '948-3-16-1484', 'title' => 'El señor de las moscas', 'author' => 'William Golding', 'stock' => 5, 'price' => 19.99],
            ['id' => 14, 'isbn' => '178-3-15-1484', 'title' => 'El señor de los anillos', 'author' => 'J. R. R. Tolkien', 'stock' => 5, 'price' => 25.99],
            ['id' => 15, 'isbn' => '678-0-06-1484', 'title' => 'Un mundo feliz', 'author' => 'Aldous Huxley', 'stock' => 5, 'price' => 19.99]
        ]);

        // Insertar clientes
        DB::table('customers')->insert([
            ['id' => 1, 'firstname' => 'Juan', 'surname' => 'Pérez', 'email' => 'juan@example.com', 'type' => 'basic', 'password' => Hash::make('password123')],
            ['id' => 2, 'firstname' => 'María', 'surname' => 'Gómez', 'email' => 'maria@example.com', 'type' => 'premium', 'password' => Hash::make('password123')]
        ]);

        // Insertar préstamos de libros
        DB::table('borrowed_books')->insert([
            ['book_id' => 1, 'customer_id' => 1, 'start' => Carbon::now()->subDays(10), 'end' => Carbon::now()->subDays(2)],
            ['book_id' => 3, 'customer_id' => 2, 'start' => Carbon::now()->subDays(5), 'end' => null]
        ]);

        // Insertar ventas
        DB::table('sales')->insert([
            ['id' => 1, 'customer_id' => 1, 'date' => Carbon::now()->subDays(7)],
            ['id' => 2, 'customer_id' => 2, 'date' => Carbon::now()->subDays(3)]
        ]);

        // Insertar relación libros-vendidos
        DB::table('sale_books')->insert([
            ['book_id' => 2, 'sale_id' => 1, 'amount' => 1],
            ['book_id' => 4, 'sale_id' => 1, 'amount' => 2],
            ['book_id' => 5, 'sale_id' => 2, 'amount' => 1]
        ]);
    }
}
