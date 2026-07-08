<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Throwable;

class ProdukService
{
    public static function calcLuas($rumus, $parameter_json)
    {
        if (!$rumus) return 1.0;
        $data = json_decode($parameter_json, true);
        $vars = $data['vals'] ?? [];
        if (empty($vars)) return 1.0;

        $expr = strtolower($rumus);
        uksort($vars, function($a, $b) { return strlen($b) - strlen($a); });
        
        foreach ($vars as $key => $val) {
            $expr = preg_replace('/\b' . preg_quote(strtolower($key), '/') . '\b/', (string)floatval($val), $expr);
        }

        if (!preg_match('/^[0-9+\-*\/().\s]+$/', $expr)) return 1.0;
        
        try {
            $result = @eval("return ($expr);");
            return max(0.0, floatval($result ?? 1.0));
        } catch (Throwable $e) {
            return 1.0;
        }
    }

    public static function recalcProduk($id_produk)
    {
        $total_bahan = DB::table('produk_bahan')->where('id_produk', $id_produk)->sum('subtotal');
        $row_f = DB::table('produk')->where('id_produk', $id_produk)->select('faktor_kesulitan')->first();
        $faktor = floatval($row_f->faktor_kesulitan ?? 1);
        $harga_jual = round(floatval($total_bahan) * $faktor, 2);

        DB::table('produk')->where('id_produk', $id_produk)->update(['harga_jual' => $harga_jual]);
    }
}