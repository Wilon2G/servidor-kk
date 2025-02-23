<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorrowedBook extends Model
{
    use HasFactory;


    protected $fillable = ['book_id', 'customer_id', 'rentedAt', 'dueTo', 'returnedAt'];

    public $timestamps = true;


    //Relación con Book (Un registro de alquiler pertenece a un libro)
    public function book()
    {
        return $this->belongsTo(Book::class);
    }


    //Relación con Customer (Un registro de alquiler pertenece a un cliente)
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * El nombre lo describe bastante bien, devuelve los books de un customer específico dado su id
     *
     * @param int $customerId
     */
    public static function getBooksByCustomer(int $customerId)
    {
        // Buscar los alquileres activos (libros que no han sido devueltos)
        return Book::whereHas('borrowedBooks', function ($query) use ($customerId) {
            $query->where('customer_id', $customerId)
                  ->whereNull('returnedAt'); // Solo los libros no devueltos
        })->get();
    }


        /**
     * Parecida a la anterior pero esta solo devuelve los ids de los libros
     *
     * @param int $customerId
     */
    public static function getBooksIdByCustomer(int $customerId)
    {
        // Buscar los alquileres activos (libros que no han sido devueltos)
        return self::where('customer_id', $customerId)
        ->whereNull('returnedAt') // Solo libros no devueltos
        ->pluck('book_id')
        ->toArray(); // Convertir a array simple para que sea más facilito de manejar
    }


    /**
     * Para alquilar libros, mejor meter esto en el modelo (creo yo)
     *
     * @param int $customerId
     * @param int $bookId
     * @return mixed
     */
    public static function rent(int $customerId, int $bookId)
    {
        // Verificar si el cliente ya tiene este libro alquilado y no lo ha devuelto, no permitimos que lo vuelva a alquilar si aún no ha devuelto su vieja copia
        $existingRental = self::where('customer_id', $customerId)
            ->where('book_id', $bookId)
            ->whereNull('returnedAt') // Solo si aún no lo ha devuelto!! Esto es importante porque no quiero eliminar info de la base de datos
            ->first();

        if ($existingRental) {
            return false; // Indica que ya tiene el libro alquilado asi que false
        }

        $book = Book::find($bookId);
        //Comprobamos el stock y si existe el libro
        if (!$book || $book->stock <= 0) {
            return ['error' => 'Unfortunately there is not enough stock of that book, try again later!'];
        }

        // Reducir el stock del libro en 1
        $book->stock -= 1;
        $book->save();

        // Crear un nuevo alquiler
        return self::create([
            'customer_id' => $customerId,
            'book_id' => $bookId,
            'rentedAt' => now(), // Fecha actual
            'dueTo' => now()->addMonth(1), // Amo a ponele un mes para qe lo devuelva
            'returnedAt' => null // Aún no devuelto
        ]);
    }




public static function returnBook(int $customerId, int $bookId){

    $existingRental = self::where('customer_id', $customerId)
    ->where('book_id', $bookId)
    ->whereNull('returnedAt')
    ->first();

    if (!$existingRental) {
        return ['error' => 'You do not have that book rented'];
    }

    $book = Book::find($bookId);
    //Comprobamos el stock y si existe el libro
    if (!$book) {
        return ['error' => 'The book selected does not exist'];
    }

    $book->stock += 1;
    $book->save();

    $existingRental->returnedAt = now();
    $existingRental->save();

    return true;

}



}
