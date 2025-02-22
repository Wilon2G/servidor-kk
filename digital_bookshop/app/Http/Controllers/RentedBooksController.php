<?php

namespace App\Http\Controllers;

use App\Models\BorrowedBook;
use Illuminate\Http\Request;

class RentedBooksController extends Controller
{

    public function index(){
        if (!auth()->check()) {
            return redirect()->route("login")->withErrors(["Unauthorised"=>"You need to logged in to see your rented books!"]);
        }

        $user=auth()->user();
        $rentedBooks=BorrowedBook::getBooksByCustomer($user["id"]);

        if (sizeof($rentedBooks)) {
            # code...
        }
        //dd($rentedBooks);

        return view("main.rentedBooks",["customer"=>$user,"rentedBooks"=>$rentedBooks]);
    }



    public function rentBook(){
        if (!auth()->check()) {
            return redirect()->route("login")->withErrors(["Unauthorised"=>"You need to logged in to rent some books!"]);
        }



    }


}
