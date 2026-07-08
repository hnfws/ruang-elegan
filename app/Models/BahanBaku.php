<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // <-- PENTING: Harus diimport

class BahanBaku extends Model
{
    use SoftDeletes; // <-- PENTING: Harus dimasukkan di dalam class

    protected $table = 'bahan_baku';
    protected $primaryKey = 'id_bahanbaku';
    public $incrementing = true;
    public $timestamps = false; // Karena kamu tidak pakai created_at & updated_at

    protected $fillable = [
        'nama_bahan',
        'merk',
        'jenis',
        'satuan',
        'tebal_mm',
    ];
}