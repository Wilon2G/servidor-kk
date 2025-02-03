<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class GeneralController extends Controller
{
    public function index(){

        $customer= Customer::create([
            'firstname' => 'Pedro',
            'surname'   => 'Prueba',
            'email'     => 'Prueba@gmail.com',
            'password'  => Hash::make('12345'), // Encripta la contraseña
            'type'      => 'basic',
        ]);


        return view('content',['content'=>"Usuario creado"]);
    }
}
