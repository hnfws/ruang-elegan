<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProdukBahan extends Model
{
    // Tentukan nama tabel asli Anda di database
    protected $table = 'produk_bahan';

    // Tentukan primary key jika bukan 'id' (di native biasanya menggunakan 'urutan')
    protected $primaryKey = 'urutan';

    // Matikan timestamps otomatis karena tabel lama tidak memilikinya
    public $timestamps = false;

    // Izinkan semua kolom diisi secara massal (mass assignment)
    protected $guarded = [];
}