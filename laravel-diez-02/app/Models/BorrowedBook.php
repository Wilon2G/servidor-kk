<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorrowedBook extends Model
{
    use HasFactory;

    // Indica los campos que son asignables en masa (mass assignment)
    protected $fillable = [
        'book_id',
        'customer_id',
        'start',
        'end',
    ];

    // Relación con la tabla 'book' (Libro)
    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    // Relación con la tabla 'customer' (Cliente)
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
