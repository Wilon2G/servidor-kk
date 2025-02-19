<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorrowedBook extends Model
{
    use HasFactory;


    protected $fillable = ['book_id', 'customer_id', 'rentedAt', 'dueTo', 'returnedAt'];

    public $timestamps = true;

    /**
     * Relación con Book (Un registro de alquiler pertenece a un libro)
     */
    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    /**
     * Relación con Customer (Un registro de alquiler pertenece a un cliente)
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * Método que devuelve todos los libros alquilados por un cliente.
     *
     * @param int $customerId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getBooksByCustomer(int $customerId)
    {
        // Buscar los alquileres activos (libros que no han sido devueltos)
        return self::where('customer_id', $customerId)
                    ->whereNull('returnedAt') // Solo los libros que no han sido devueltos
                    ->with('book') // Cargar la relación con el libro
                    ->get();
    }
}
