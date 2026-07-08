<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EstimatorController extends Controller
{
    public function index()
    {
        // 1. Total Produk
        $total_produk = DB::table('produk')->count();

        // 2. Total Quotation (Karena tidak ada kolom status, dihitung total seluruhnya)
        $total_acc = DB::table('quotation')->count();

        // 3. Total Omset / Penjualan dari Seluruh Quotation
        $total_sales = DB::table('quotation')->sum('total_harga') ?? 0;

        // 4. Data untuk Grafik Lingkaran (Doughnut)
        // Diisi default agar chart pada tampilan blade tidak pecah/error kosong
        $status_data = ['draft' => 0, 'sent' => 0, 'acc' => $total_acc, 'rejected' => 0];

        // 5. Navbar Messages (3 Quotation terbaru)
        $q_navbar_messages = DB::table('quotation as q')
            ->join('customer as c', 'q.id_customer', '=', 'c.id_customer')
            ->select('q.*', 'c.nama')
            ->orderBy('q.id_quotation', 'desc')
            ->limit(3)
            ->get();
        $total_messages = $q_navbar_messages->count();

        // 6. Navbar Notifications (4 Quotation terbaru - filter status dihapus)
        $q_navbar_notif = DB::table('quotation as q')
            ->join('customer as c', 'q.id_customer', '=', 'c.id_customer')
            ->select('q.*', 'c.nama')
            ->orderBy('q.id_quotation', 'desc')
            ->limit(4)
            ->get();
        $total_notif = $q_navbar_notif->count();

        // 7. Data untuk Grafik Garis Penjualan (Flot Chart - filter status dihapus)
        $q_graph = DB::table('quotation')
            ->select('tgl_dibuat', DB::raw('SUM(total_harga) as total'))
            ->groupBy('tgl_dibuat')
            ->orderBy('tgl_dibuat', 'asc')
            ->get();

        $chart_sales_data = [];
        foreach ($q_graph as $row) {
            $timestamp = strtotime($row->tgl_dibuat) * 1000;
            $chart_sales_data[] = "[".$timestamp.", ".$row->total."]";
        }
        $js_sales_data = implode(",", $chart_sales_data);

        // 8. Product Gallery & Fallback
        // ========== PERBAIKAN BAGIAN 8 ==========
// Menghapus 'q.desain' karena kolom tersebut tidak ada di tabel quotation
$sub_query = DB::table('detail_quotation as dq')
->join('quotation as q', 'dq.id_quotation', '=', 'q.id_quotation')
->select('dq.id_produk', 'dq.id_detail');

$q_galeri_produk = DB::table('produk as p')
->joinSub($sub_query, 'sub', function ($join) {
    $join->on('p.id_produk', '=', 'sub.id_produk');
})
->select('p.*', DB::raw('NULL as desain')) // Set default NULL agar blade tidak error membaca property desain
->orderBy('sub.id_detail', 'desc')
->distinct('p.id_produk') 
->limit(3)
->get();

        if ($q_galeri_produk->isEmpty()) {
            $q_galeri_produk = DB::table('produk')
                ->select('*', DB::raw('NULL as desain'))
                ->orderBy('id_produk', 'desc')
                ->limit(3)
                ->get();
        }

        // 9. Section More Products
        $q_more_produk = DB::table('produk')->orderBy('id_produk', 'asc')->limit(4)->get();

        // Mengirimkan semua data di atas ke view Blade di dalam folder estimator
        return view('estimator.index', compact(
            'total_produk', 'total_acc', 'total_sales', 'status_data',
            'q_navbar_messages', 'total_messages', 'q_navbar_notif', 'total_notif',
            'js_sales_data', 'q_galeri_produk', 'q_more_produk'
        ));
    }
}