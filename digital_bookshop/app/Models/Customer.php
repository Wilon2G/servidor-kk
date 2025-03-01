<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Customer extends Authenticatable
{
    use HasFactory;

    protected $fillable = ['firstname', 'surname', 'email', 'password', 'type'];

    //Esto es para que cuando el atributo password no se incluya cuando el modelo se transforme en array o JSON (por seguridad)
    protected $hidden = [
        'password',
        'remember_token',
    ];

    //Y esto es para que la contraseña se cifre automáticamente (se hace automáticamente con la función bcrypt())
    protected $casts = [
        'password' => 'hashed',
        'type' => 'string',
    ];

    public function getAuthIdentifierName()
    {
        return 'email';
    }

    public $timestamps = true;

    /**
     * Relación con las ventas (Un cliente puede tener muchas ventas)
     */
    public function sales()
    {
        return $this->hasMany(Sale::class);
    }

    /**
     * Relación con los alquileres (Un cliente puede alquilar muchos libros)
     */
    public function borrowedBooks()
    {
        return $this->belongsToMany(Book::class, 'borrowed_books', 'customer_id', 'book_id')
                    ->withPivot(['rentedAt', 'dueTo', 'returnedAt'])
                    ->withTimestamps();
    }

    /**
     * Verifica si el cliente es un administrador
     */
    public function isAdmin(): bool
    {
        return $this->type === 'admin' ? true : false;
    }

}
