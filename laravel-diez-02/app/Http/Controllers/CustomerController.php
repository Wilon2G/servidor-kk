<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    public function userIsLogged(){
        return session()->has('customer_id');
    }

    public function index(){

        if (!$this->userIsLogged()) {
            return view("forms.logInForm");
        }

        return back()->with("error","You are already logged in, please log out");
    }

    public function validateUser(){
        $email=request()->get("email","");
        $password=request()->get("password","");

        $customer = Customer::where('email', $email)->first();

        if ($customer && Hash::check($password, $customer->password)) {
            session(['customer_id' => $customer->id]);

            return redirect()->route('dashboard')->with("success","Welcome!");
        }

        return back()->with("error","Incorrect email or password");
        # return redirect()->route('dashboard'); Para redirigir
    }

    public function registerUser(){
        if ($this->userIsLogged()) {
            # code...
        }
        return view("forms.registerForm");
    }

    public function logout(){
        if (!$this->userIsLogged()) {
            return redirect()->route('login')->with("success","You are already logged out");
        }
        session()->forget('customer_id'); // Elimina el ID de la sesión
        return redirect()->route('login');
    }

}
