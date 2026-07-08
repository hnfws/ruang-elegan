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
    Schema::create('produk', function (Blueprint $table) {
        $table->integer('id_produk')->autoIncrement();
        $table->string('nama_bentuk', 100);
        $table->decimal('faktor_kesulitan', 5, 2)->default(1.00);
        $table->decimal('harga_jual', 15, 2)->default(0.00);
        $table->enum('status', ['draft', 'acc', 'rejected'])->default('draft');
        $table->string('gambar_produk', 225);
        $table->primary('id_produk');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk');
    }
};
