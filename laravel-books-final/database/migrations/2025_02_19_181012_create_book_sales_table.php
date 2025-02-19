<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('book_sales', function (Blueprint $table) {
            $table->id(); // ID autoincremental para mejorar las relaciones
            $table->unsignedBigInteger('book_id');
            $table->unsignedBigInteger('sale_id');
            $table->smallInteger('amount'); // Cantidad de libros comprados aunque podría hacerlo de otra forma pero weno
            $table->timestamps();

            // Claves foráneas con eliminación en cascada
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
            $table->foreign('sale_id')->references('id')->on('sales')->onDelete('cascade');

            // Evita ventas duplicadas del mismo libro en la misma transacción
            $table->unique(['book_id', 'sale_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_sales');
    }
};
