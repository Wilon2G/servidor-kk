<?php

namespace App\Http\Controllers;
use App\Models\Book;
use App\Models\BorrowedBook;
use App\Models\Sale;
use App\Models\SaleBook;
use Illuminate\View\View;
use Illuminate\Http\Request;

class BookController extends Controller
{
    //
    public function index(): View{
        $books= Book::all();

        //dump($books);
        return view( "layout.main",['loggedIn'=>$this->userIsLogged(),"books"=>$books,"user"=>$this->userBooksId(),"menu"=>1]);
    }

    public function userBooksId(){
        if (!session()->has('customer_id')) {
            return null;
        }
        $customerId=session("customer_id");
        $customerBooksId=BorrowedBook::where("customer_id",$customerId)->pluck("book_id");
        //dd($customerBooksId);
        return $customerBooksId;
    }


    public function rent($id){
        //dd($id);
        $customerBooksId=$this->userBooksId()->toArray();
        if (in_array($id,$customerBooksId)) {
            return back()->with("error","You already have that book rented, only one copy per person");
        }
        
        $this->addSubStock($id,-1);

        BorrowedBook::create([
            'book_id' => $id,          
            'customer_id' => session("customer_id"),      
            'start' => now(),        
            'end' => now()->addDays(7), 
        ]);

        return back()->with("success","Book rented!");
    }


    public function returnBook($id){
        $customerBooksId=$this->userBooksId()->toArray();
        if (!in_array($id,$customerBooksId)) {
            return back()->with("error","Error, book chosen is not currentlyrented, please recharge the page");
        }

        $this->addSubStock($id,1);
        $customerId=session("customer_id");
        $borrowedBook= BorrowedBook::where("book_id",$id)->where("customer_id",$customerId);
        if (!$borrowedBook) {
            return back()->with("error","Error in database, book or customer don't exist");
        }

        $borrowedBook->delete();

        return back()->with("success","Book returned successfully");
    }



    public function addSubStock($bookId,$addOrSub){
        $targetBook= Book::where("id",$bookId)->first();

        if ($targetBook) {
            $targetBook->stock+=$addOrSub;
            if ($targetBook->stock<0) {
                abort(404, 'Stock can not go below 0');
            }

            $targetBook->save();
            return true;
        }
        else {
            abort(404, 'Libro no encontrado');
        }
    }

    public function userIsLogged(){
        return session()->has('customer_id');
    }

    public function userPurchasesId(){
        if (!session()->has('customer_id')) {
            return null;
        }
        $customerId=session("customer_id");
        
        $saleId=Sale::where("customer_id",$customerId)->pluck("id");
        //dd($saleId);
        if ( sizeof($saleId)===0 ) {
            return null;
        }
        $customerPurchasesId=SaleBook::where("sale_id",$saleId)->pluck("book_id");
        //dd($customerPurchasesId);
        return $customerPurchasesId;
    }

    public function userBooks(){

        $customerBooksId =$this->userBooksId();
        //dd($customerBooksId);
        $customerBooks= Book::whereIn("id",$customerBooksId)->get();

        //dd($customerBooks);
        return view("layout.main",['loggedIn'=>$this->userIsLogged(),"menu"=>2,"userBooks"=>$customerBooks]);

        //return redirect()->route('dashboard')->with("userBooks",$customerBooks);
        
    }

    public function purchases(){

        $customerPurchasesId=$this->userPurchasesId();

        if ($customerPurchasesId===null) {
            return back()->with("error","You don't have books yet!");
        }
        
        $customerBooks= Book::whereIn("id",$customerPurchasesId)->get();


        return view("layout.main",['loggedIn'=>$this->userIsLogged(),"menu"=>3,"userBooks"=>$customerBooks]);
    }

    public function addBook(){
        $title=request()->get("title","");
        $isbn=request()->get("isbn","");
        $author=request()->get("author","");
        $stock=request()->get("stock","");
        $price=request()->get("price","");

        Book::create([
            "title"=>$title,
            "author"=>$author,
            "ISBN"=>$isbn,
            "stock"=>$stock,
            "price"=>$price,
            "created_at"=>now()
        ]);

        return back()->with("success","Book added!");

    }

    public function deleteBook($id){

        $book=Book::select()->where(["id"=>$id]);

        //dd($book);
        $book->delete();

        return back()->with("success","Book deleted successfully");
    }


}


/* 
use App\Models\BorrowedBook;

public function borrowBook($bookId, $customerId) {
    // Crear una nueva instancia de BorrowedBook
    $borrowedBook = new BorrowedBook();

    // Asignar los valores a las columnas de la tabla
    $borrowedBook->book_id = $bookId;
    $borrowedBook->customer_id = $customerId;
    $borrowedBook->start = now();  // Fecha y hora actual como la fecha de inicio
    $borrowedBook->end = now()->addWeeks(2);  // Fecha de fin (por ejemplo, 2 semanas después)

    // Guardar el registro en la base de datos
    $borrowedBook->save();

    // Retornar un mensaje de éxito o redirigir a alguna vista
    return redirect()->back()->with('success', '¡Libro alquilado con éxito!');
}


*/