<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;


class CustomerController extends Controller
{

    public function userIsLogged()
    {
        return session()->has('customer_id');
    }

    public function index()
    {

        if (!$this->userIsLogged()) {
            return view("forms.logInForm");
        }

        return back()->with("error", "You are already logged in, please log out");
    }

    public function validateRegister(Request $request)
    {
        try {
            // Validación de datos!!!
            $validated = $request->validate([
                'firstName' => 'required|string|max:255',
                'surname' => 'required|string|max:255',
                'userName' => 'required|email|unique:customers,email|max:255',
                'password' => 'required|string|min:6',
                'type' => 'required|string'
            ]);

            Customer::create([
                'firstname' => $validated['firstName'],
                'surname' => $validated['surname'],
                'email' => $validated['userName'],
                'password' =>$validated['password'],
                'plan' => $validated['type'],
            ]);

            return redirect("login")->with("success","The registration was a success, log in to complete the process!");

        } catch (ValidationException $e) {
            return back()->withErrors($e->errors())->withInput();
        }
    }

    public function validateUser()
    {
        $email = request()->get("email", "");
        $password = request()->get("password", "");

        $customer = Customer::where('email', $email)->first();

        if ($customer && Hash::check($password, $customer->password)) {
            session(['customer_id' => $customer->id]);
            session(['customer_type' => $customer->type]);
            session(['customer_name' => $customer->firstname]);

            return redirect()->route('dashboard')->with("success", "Welcome!");
        }

        return back()->with("error", "Incorrect email or password, try to register first!");
        # return redirect()->route('dashboard'); Para redirigir
    }

    public function registerUser()
    {
        if ($this->userIsLogged()) {
            # code...
        }
        return view("forms.registerForm");
    }

    public function logout()
    {
        if (!$this->userIsLogged()) {
            return redirect()->route('login')->with("success", "You are already logged out");
        }
        session()->forget('customer_id'); // Elimina el ID de la sesión
        return redirect()->route('login');
    }
}
