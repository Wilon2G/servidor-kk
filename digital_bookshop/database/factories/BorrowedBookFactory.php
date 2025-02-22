<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\BorrowedBook;
use App\Models\Customer;
use App\Models\Book;

class BorrowedBookFactory extends Factory
{
    protected $model = BorrowedBook::class;

    public function definition(): array
    {
        $rentedAt = $this->faker->dateTimeThisYear();
        return [
            'book_id' => Book::factory(),
            'customer_id' => Customer::factory(),
            'rentedAt' => $rentedAt,
            'dueTo' => (clone $rentedAt)->modify('+1 month'), // Fecha de devolución 1 mes después
            'returnedAt' => $this->faker->optional(0.7)->dateTimeBetween($rentedAt, (clone $rentedAt)->modify('+1 month')), // Con esto falseo que aprox el 70% de los libros se han devuelto
        ];
    }
}
