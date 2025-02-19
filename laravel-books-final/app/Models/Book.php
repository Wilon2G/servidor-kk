<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['ISBN', 'title', 'author', 'stock', 'price'];

    public $timestamps = true;

    /**
     * Relación con las ventas (Muchos a Muchos)
     */
    public function sales()
    {
        return $this->belongsToMany(Sale::class, 'book_sales')
                    ->withPivot('amount') // Cantidad de libros comprados
                    ->withTimestamps();
    }

    /**
     * Relación con los alquileres (Uno a Muchos)
     */
    public function borrowedBooks()
    {
        return $this->hasMany(BorrowedBook::class);
    }

}
