<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    // 1. TENTUKAN NAMA TABEL SECARA MANUAL
    protected $table = 'produk';

    // 2. Tentukan primary key (karena default Laravel mencari kolom bernama 'id')
    protected $primaryKey = 'id_produk';

    // 3. Matikan timestamps jika Anda memilih Cara 1 di langkah sebelumnya
    public $timestamps = false;

    // 4. Pengaturan Mass Assignment
    protected $fillable = [
        'nama_bentuk',
        'faktor_kesulitan',
        'harga_jual',
        'status',
        'gambar_produk'
    ];
}