<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailQuotation extends Model {
    protected $table = 'detail_quotation';
    protected $primaryKey = 'id_detail';
    protected $fillable = ['id_quotation', 'id_produk', 'qty', 'harga_satuan', 'subtotal'];
public $timestamps = false;
    public function quotation() {
        return $this->belongsTo(Quotation::class, 'id_quotation');
    }

    public function produk() {
        return $this->belongsTo(Produk::class, 'id_produk');
    }
}