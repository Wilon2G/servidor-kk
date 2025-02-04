<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    // Indica los campos que son asignables en masa (mass assignment)
    protected $fillable = [
        'customer_id',
        'date',
    ];

    // Relación con la tabla 'sale_books' (Libros vendidos)
    public function saleBooks()
    {
        return $this->hasMany(SaleBook::class);
    }

    // Relación con la tabla 'customer' (Cliente)
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
