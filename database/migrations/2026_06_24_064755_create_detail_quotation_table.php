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
    Schema::create('detail_quotation', function (Blueprint $table) {
        $table->integer('id_detail')->autoIncrement();
        $table->integer('id_quotation');
        $table->integer('id_produk');
        $table->decimal('qty', 8, 2)->default(1.00);
        $table->decimal('harga_satuan', 15, 2)->default(0.00)->comment('Snapshot harga produk saat quotation dibuat');
        $table->decimal('subtotal', 15, 2)->default(0.00)->comment('qty x harga_satuan');

        $table->primary('id_detail');

        // Foreign Key Constraints
        $table->foreign('id_quotation')->references('id_quotation')->on('quotation')->onDelete('cascade')->onUpdate('cascade');
        $table->foreign('id_produk')->references('id_produk')->on('produk')->onDelete('cascade')->onUpdate('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_quotation');
    }
};
