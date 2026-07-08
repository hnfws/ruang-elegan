<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Throwable;

class ProdukKalkulasiService
{
    // 1. Membaca rumus kustom dan parameter dimensi (JSON) menjadi nilai luas
    public static function calcLuas($rumus, $param_json)
    {
        if (!$rumus) return 1.0;
        $data = is_array($param_json) ? $param_json : json_decode($param_json, true);
        $vars = $data['vals'] ?? [];
        if (empty($vars)) return 1.0;

        $expr = strtolower($rumus);
        uksort($vars, function($a, $b) { return strlen($b) - strlen($a); });
        foreach ($vars as $key => $val) {
            $expr = preg_replace('/\b'.preg_quote(strtolower($key),'/').'\b/', (string)floatval($val), $expr);
        }

        if (!preg_match('/^[0-9+\-*\/().\s]+$/', $expr)) return 1.0;
        try {
            $result = @eval("return ($expr);");
            return max(0.0, floatval($result ?? 1.0));
        } catch (Throwable $e) {
            return 1.0;
        }
    }

    // 2. Menghitung & update subtotal rupiah per komponen bahan baku
    public static function recalcProdukBahan($urutan)
    {
        $pb = DB::table('produk_bahan')
            ->join('bahan_baku', 'produk_bahan.id_bahanbaku', '=', 'bahan_baku.id_bahanbaku')
            ->where('produk_bahan.urutan', $urutan)
            ->select('produk_bahan.qty', 'produk_bahan.luas_hasil', 'bahan_baku.harga_unit')
            ->first();

        if ($pb) {
            $subtotal = floatval($pb->qty) * floatval($pb->luas_hasil) * floatval($pb->harga_unit);
            DB::table('produk_bahan')->where('urutan', $urutan)->update(['subtotal' => $subtotal]);
        }
    }

    // 3. Merangkum total seluruh subtotal bahan x faktor kesulitan menjadi harga_jual produk
    public static function recalcProdu($id_produk)
    {
        $total_bahan = DB::table('produk_bahan')->where('id_produk', $id_produk)->sum('subtotal');
        
        $produk = DB::table('produk')->where('id_produk', $id_produk)->first();
        if ($produk) {
            $faktor_kesulitan = floatval($produk->faktor_kesulitan ?? 1);
            $harga_jual = floatval($total_bahan) * $faktor_kesulitan;

            DB::table('produk')->where('id_produk', $id_produk)->update([
                'harga_jual' => $harga_jual
            ]);
        }
    }
}