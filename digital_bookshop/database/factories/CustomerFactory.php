<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Customer;

class CustomerFactory extends Factory
{
    protected $model = Customer::class;

    public function definition(): array
    {
        return [
            'firstname' => $this->faker->firstName(),
            'surname' => $this->faker->lastName(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => $this->faker->password(), // Contraseña que se encripta automáticamente (ver el modelo customer)
            'type' => 'basic', //Los que creo con factory los voy a hacer todos basic, el admin lo crearé especíuficamente
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
