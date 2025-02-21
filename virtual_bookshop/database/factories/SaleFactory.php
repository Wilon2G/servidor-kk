<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Sale;
use App\Models\Customer;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sale>
 */
class SaleFactory extends Factory
{
    protected $model = Sale::class;

    public function definition(): array
    {
        return [
            'customer_id' => Customer::factory(), // Genera un cliente aleatorio
            'date' => $this->faker->dateTimeThisYear(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
