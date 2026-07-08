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
    Schema::create('bahan_baku', function (Blueprint $table) {
        $table->integer('id_bahanbaku')->autoIncrement();
        $table->string('nama_bahan', 100);
        $table->string('merk', 100)->nullable();
        $table->string('jenis', 100)->nullable();
        $table->enum('satuan', ['m2', 'lembar', 'unit', 'meter'])->default('m2');
        $table->decimal('tebal_mm', 8, 2)->nullable();
        $table->primary('id_bahanbaku');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bahan_baku');
    }
};
