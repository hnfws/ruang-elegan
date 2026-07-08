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
    Schema::create('staff', function (Blueprint $table) {
        $table->integer('id_staff')->autoIncrement();
        $table->string('nama', 100);
        $table->string('no_hp', 20)->nullable();
        $table->enum('role', ['estimator', 'driver', 'tukang', 'admin', 'owner', 'bersih'])->default('estimator');
        $table->string('email', 50)->nullable();
        $table->string('password', 50)->nullable();


        $table->primary('id_staff');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff');
    }
};
