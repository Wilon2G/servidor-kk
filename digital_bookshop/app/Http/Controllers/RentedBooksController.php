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
        $rentals=BorrowedBook::getBooksByCustomer($user["id"]);

        //dd($rentedBooks);

        return view("main.rentedBooks",["customer"=>$user,"rentals"=>$rentals]);
    }



    public function rentBook($id){

        //Comprobamos que el usuario está loggeado, esto va a haber que hacerlo en casi todos los lados pero seguramente con middelware se soluciona
        if (!auth()->check()) {
            return redirect()->route("login")->withErrors(["Unauthorised"=>"You need to logged in to rent some books!"]);
        }
        //Devuelve false si el libro está actualmente alquilado
        $rental = BorrowedBook::rent(auth()->user()["id"],$id);

        if (!$rental) {
            return back()->withErrors(['error' => 'You have not returned this book yet!']);
        }

        return back()->with('success', 'Book rented successfully!!!');


    }




    public function returnBook($id){
        if (!auth()->check()) {
            return redirect()->route("login")->withErrors(["Unauthorised"=>"You need to logged in to see your rented books!"]);
        }

        $return=BorrowedBook::returnBook(auth()->user()["id"],$id);
        if (!$return) {
            return back()->withErrors(['error' => 'An error occured']);
        }

        return back()->with('success', 'The book was returned!');

    }
}
