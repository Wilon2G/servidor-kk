<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id', 'date'];

    public $timestamps = true;

    /**
     * Relación con Customer (Una venta pertenece a un cliente)
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * Relación con Book (Una venta puede tener muchos libros)
     */
    public function books()
    {
        return $this->belongsToMany(Book::class, 'book_sales')
                    ->withPivot('amount') // Cuántos libros fueron vendidos
                    ->withTimestamps();
    }

    /**
     * Método que devuelve todos los libros comprados en una venta dada.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getBooksPurchased()
    {
        return $this->books; // Devuelve los libros asociados a esta venta
    }
}
