<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Book;

class BookFactory extends Factory
{
    protected $model = Book::class;

    public function definition(): array
    {
        return [
            'ISBN' => $this->faker->isbn13(), // Genera un ISBN aleatorio (que guay,faker incluso tiene para generar isbn!!)
            'title' => $this->faker->sentence(3), // Título ficticio
            'author' => $this->faker->name(),
            'stock' => $this->faker->numberBetween(5, 50), // Stock aleatorio
            'price' => $this->faker->randomFloat(2, 5, 50), // Precio entre 5 y 50
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
