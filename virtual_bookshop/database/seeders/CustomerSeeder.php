<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Customer::factory()->count(15)->create();

        //Creamos al admin específicamente
        Customer::create([
            'firstname' => 'Admin',
            'surname' => 'Admin',
            'email' => 'admin@test.com',
            'password' => "admin",
            'type' => 'admin',
        ]);
    }
}
