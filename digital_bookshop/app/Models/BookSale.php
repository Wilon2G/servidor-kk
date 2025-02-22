<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class BookSale extends Pivot
{
    // Usamos Pivot porque la clase BookSale representa una tabla pivote
    //Realmente nunca voy a introducir datos directamente en esta tabla
    //IMPORTANTE
    //Casi siempre voy a coger una "Sale" específica y le voy a hacer    $sale->books()->attach($bookId, ['amount' => 3])
    //Así que este modelo lo incluyo solo por si acaso necesito modificar algo muy específico

    protected $table = 'book_sales'; // Definir explícitamente la tabla (no necesario si sigue la convención)

    // Campos que se pueden asignar masivamente
    protected $fillable = ['book_id', 'sale_id', 'amount'];

    public $timestamps = true; // Si tienes las columnas `created_at` y `updated_at` en la tabla pivote

    /**
     * Relación con Book (Un libro pertenece a una venta a través de la tabla pivote)
     */
    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    /**
     * Relación con Sale (Una venta pertenece a un libro a través de la tabla pivote)
     */
    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }
}
