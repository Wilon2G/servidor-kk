<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\BorrowedBook;
use App\Models\Sale;

class IndexController extends Controller
{
    public function index(){
        $books=Book::all();
        $customer=auth()->user();
        if ($customer) {
            $borroweBooks=BorrowedBook::getBooksIdByCustomer($customer["id"]);
        }
        else{
            $borroweBooks=[];
        }

        return view("main.library",["customer"=>$customer,"books"=>$books,"borrowedBooks"=>$borroweBooks]);
    }

    public function deleteBook($id){
        if (!auth()->check()) {
            return redirect()->route("login")->withErrors(["Unauthorised"=>"You need to be logged in to delete books"]);
        }

        if (auth()->user()["type"]!=="admin") {
            return back()->withErrors(["unauthorised"=>"You don't have access to this function"]);
        }

        $book=Book::find($id);
        if (!$book) {
            return back()->withErrors(["Error"=>"The book that you are destroying do not exist"]);
        }


        Book::destroy($id);

        return back()->with("success","The book was deleted successfully");

    }

    public function buyBook($id){
        // Verificar si el usuario está autenticado
        if (!auth()->check()) {
            return redirect()->route("login")->withErrors(["error" => "You must be logged in to buy books!"]);
        }

        $user = auth()->user();
        $book = Book::find($id);

        // Verificar si el libro existe
        if (!$book) {
            return redirect()->route("index")->withErrors(["error" => "The book does not exist!"]);
        }

        // Verificar si hay suficiente stock
        if ($book->stock < 1) {
            return redirect()->route("index")->withErrors(["error" => "This book is out of stock!"]);
        }

        // Crear la venta
        $sale = Sale::create([
            'customer_id' => $user->id,
            'date' => now()
        ]);

        // Asociar el libro con la venta en la tabla pivote `book_sales`
        $sale->books()->attach($book->id, ['amount' => 1]);

        // Reducir stock del libro
        $book->stock -= 1;
        $book->save();

        return redirect()->route("index")->with("success", "Book purchased successfully! 🎉");
    }

}
