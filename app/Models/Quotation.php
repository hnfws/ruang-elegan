<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Quotation extends Model
{
    protected $table = 'quotation';
    protected $primaryKey = 'id_quotation';
    
    // TAMBAHKAN BARIS INI UNTUK MEMATIKAN UPDATED_AT / CREATED_AT otomatis:
    public $timestamps = false;

    protected $fillable = [
        'id_quotation', 'id_customer', 'tgl_dibuat', 'diskon', 'total_harga', 'desain'
    ];

    public function recalculateTotal() {
        $total_items = DB::table('detail_quotation')
            ->where('id_quotation', $this->id_quotation)
            ->sum('subtotal');
    
        $diskon = floatval($this->diskon ?? 0);
        $grand_total = $total_items - $diskon;
    
        $this->update([
            'total_harga' => $grand_total < 0 ? 0 : $grand_total
        ]);
    }

    public function customer() {
        return $this->belongsTo(Customer::class, 'id_customer');
    }
}