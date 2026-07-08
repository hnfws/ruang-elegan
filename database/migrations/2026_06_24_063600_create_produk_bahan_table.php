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
    Schema::create('produk_bahan', function (Blueprint $table) {
        $table->integer('id_produk');
        $table->integer('id_bahanbaku');
        $table->decimal('qty', 10, 4)->default(1.0000);
        $table->integer('urutan')->autoIncrement();
        $table->unique('urutan');
        // Foreign Key Constraints
        $table->foreign('id_produk')->references('id_produk')->on('produk')->onDelete('cascade')->onUpdate('cascade');
        $table->foreign('id_bahanbaku')->references('id_bahanbaku')->on('bahan_baku')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk_bahan');
    }
};
