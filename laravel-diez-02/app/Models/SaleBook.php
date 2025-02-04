<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleBook extends Model
{
    use HasFactory;

    // Indica los campos que son asignables en masa (mass assignment)
    protected $fillable = [
        'book_id',
        'sale_id',
        'amount',
    ];

    // Relación con la tabla 'book' (Libro)
    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    // Relación con la tabla 'sale' (Venta)
    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }
}
