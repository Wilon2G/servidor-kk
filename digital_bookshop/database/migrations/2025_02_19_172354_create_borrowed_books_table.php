<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('borrowed_books', function (Blueprint $table) {
            $table->id(); // ID autoincremental de la relación
            $table->unsignedBigInteger('book_id');
            $table->unsignedBigInteger('customer_id');
            $table->dateTime('rentedAt')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('dueTo');
            $table->dateTime('returnedAt')->nullable();
            $table->timestamps();

            // Claves foráneas con eliminación en cascada
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');

            // Restricción para evitar alquiler duplicado del mismo libro por el mismo usuario (Igual lo cambio en el futuro)
            //$table->unique(['book_id', 'customer_id']); Al final lo he quitado porque quiero que un usuario pueda alquilar dos veces el mismo libro si antes lo ha devuelto
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borrowed_books');
    }
};
