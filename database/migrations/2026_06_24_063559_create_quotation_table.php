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
    Schema::create('quotation', function (Blueprint $table) {
        $table->integer('id_quotation')->autoIncrement();
        $table->integer('id_customer');
        $table->decimal('total_harga', 15, 2)->default(0.00);
        $table->decimal('diskon', 15, 2)->default(0.00);
        $table->date('tgl_dibuat')->useCurrent();
        $table->primary('id_quotation');

        // Foreign Key Constraints
        $table->foreign('id_customer')->references('id_customer')->on('customer')->onDelete('cascade')->onUpdate('cascade');
        $table->foreign('id_staff')->references('id_staff')->on('staff')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quotation');
    }
};
