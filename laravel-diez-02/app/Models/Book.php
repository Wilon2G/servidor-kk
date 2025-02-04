<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    // Indica los campos que son asignables en masa (mass assignment)
    protected $fillable = [
        'ISBN',
        'title',
        'author',
        'stock',
        'price',
    ];

    // Relación con la tabla 'borrowed_books' (Libros prestados)
    public function borrowedBooks()
    {
        return $this->hasMany(BorrowedBook::class);
    }

    // Relación con la tabla 'sale_books' (Libros vendidos)
    public function saleBooks()
    {
        return $this->hasMany(SaleBook::class);
    }
}
