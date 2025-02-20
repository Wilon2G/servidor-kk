<?php

namespace App\Http\Controllers;
use App\Models\Book;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
       //dd(session()->all());
        $customer = auth()->user();
        $books=Book::all();

        return view("main.library",["customer"=>$customer,"books"=>$books]);
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
