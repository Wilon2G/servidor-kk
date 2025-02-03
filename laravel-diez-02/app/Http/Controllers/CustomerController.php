<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{

    function userIsLogged(){
        return session()->has('user');
    }

    function index(){

        if (!$this->userIsLogged()) {
            return view("logInForm",['titulo'=>"Log In",'encabezado'=>"Welcome To The Digital BookShop"]);
        }

        return view('welcome');
    }

   
}
