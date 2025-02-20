<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $customer = Auth::user();
        $books=Book::all();
        //dd($customer);

        return view("test");
        //return view("main.library",["customer"=>$customer,"books"=>$books]);
    }

    public function profile()
    {
        $customer = auth()->user();

        if (!$customer) {
            return response()->json(['error' => 'No autenticado'], 401);
        }

        return response()->json(['customer' => $customer]);
    }

}
