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
            $table->foreignId('book_id')->constrained()->onDelete('cascade');
            $table->foreignId('customer_id')->constrained()->onDelete('cascade');
            $table->dateTime('rentedAt')->default(now());
            $table->dateTime('dueTo');
            $table->dateTime('returnedAt')->nullable();
            $table->timestamps();
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
