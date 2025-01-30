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
        Schema::create('sale_books', function (Blueprint $table) {
            $table->integer('book_id');
            $table->integer('sale_id')->index();
            $table->smallInteger('amount');
            $table->timestamps();

            $table->foreign('book_id')->references('id')->on('books');
            $table->foreign('sale_id')->references('id')->on('sales');

            $table->primary(['book_id', 'sale_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sale_books');
    }
};
