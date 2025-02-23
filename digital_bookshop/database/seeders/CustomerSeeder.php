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
        //Creamos al admin específicamente
        Customer::create([
            'firstname' => 'Admin',
            'surname' => 'Admin',
            'email' => 'admin@test.com',
            'password' => "admin",
            'type' => 'admin',
        ]);

        //Y a uno extra que no tiene permiso de admin
        Customer::create([
            'firstname' => 'Basic',
            'surname' => 'Basic',
            'email' => 'basic@test.com',
            'password' => "basic",
            'type' => 'basic',
        ]);

        Customer::factory()->count(5)->create();



    }
}
