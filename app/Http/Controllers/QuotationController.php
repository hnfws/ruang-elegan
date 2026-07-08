<?php

namespace App\Http\Controllers;

use App\Models\Quotation;
use App\Models\Customer;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB; // <-- TAMBAHKAN BARIS INI

class QuotationController extends Controller {
    public function index() {
        $quotations = Quotation::with(['customer'])->orderBy('id_quotation', 'desc')->get();
        return view('admin.quotation.index', compact('quotations'));
    }

    public function create(Request $request) {
        $customers = Customer::orderBy('nama')->get();
        
        $from_produk_id = $request->get('id_produk');
        $auto_produk = $from_produk_id ? Produk::where('id_produk', $from_produk_id)->where('status', 'acc')->first() : null;

        return view('admin.quotation.create', compact('customers', 'auto_produk'));
    }

    public function store(Request $request)
    {
        // 1. Validasi Input Form
        $request->validate([
            'tgl_dibuat'   => 'required|date',
            'id_customer'  => 'required',
        ]);

        // 2. PERBAIKAN: Tampung hasil create ke dalam variabel $quotation agar tidak Undefined!
        $quotation = Quotation::create([
            'id_customer'  => $request->id_customer,
            'tgl_dibuat'   => $request->tgl_dibuat,
            'diskon'       => $request->diskon ?? 0,
            'total_harga'  => 0, // Inisialisasi awal 0 sebelum item diinput
        ]);

        // 3. Cek apakah quotation ini dibuat otomatis dari tombol "ACC" halaman Produk
        if ($request->has('auto_produk_id') && !empty($request->auto_produk_id)) {
            $produk = Produk::find($request->auto_produk_id);
            if ($produk) {
                // Gunakan variabel $quotation yang sudah dibuat di atas
                \App\Models\DetailQuotation::create([
                    'id_quotation'        => $quotation->id_quotation,
                    'id_produk'           => $produk->id_produk,
                    'nama_produk_history' => $produk->nama_bentuk, // Kunci riwayat nama produk
                    'qty'                 => 1,
                    'harga_satuan'        => $produk->harga_jual,
                    'subtotal'            => $produk->harga_jual
                ]);

                // Rekalkulasi total harga header quotation
                $quotation->recalculateTotal();
            }
        }

        // 4. Redirect menggunakan variabel $quotation yang sudah aman
        return redirect()->route('admin.quotation.items.index', $quotation->id_quotation)
                         ->with('notif_success', 'Header Quotation berhasil dibuat! Silakan kelola item rincian.');
    }

    public function edit($id) {
        $quot = Quotation::findOrFail($id);
        $customers = Customer::orderBy('nama')->get();
        return view('admin.quotation.edit', compact('quot', 'customers'));
    }

    public function update(Request $request, $id)
    {
        $quot = Quotation::findOrFail($id);
    
        // 1. Ambil input diskon dari form, ubah ke angka float
        $diskon = floatval($request->input('diskon', 0));
    
        // 2. Update data ke database
        $quot->update([
            'id_customer' => $request->id_customer,
            'tgl_dibuat'  => $request->tgl_dibuat,
            'diskon'      => $diskon,
        ]);
    
        // 3. Panggil fungsi hitung otomatis yang ada di Model
        $quot->recalculateTotal();
    
        return redirect()->route('admin.quotation.index')->with('notif', 'Master Quotation berhasil diperbarui!');
    }

    public function destroy($id) {
        $quotation = Quotation::findOrFail($id);
        $quotation->delete();
        return redirect()->route('admin.quotation.index')->with('notif_success', 'Quotation berhasil dihapus!');
    }



    public function print(Request $request, $id)
    {
        $id_quotation = intval($id);
        if (!$id_quotation) {
            abort(404, 'ID Quotation tidak valid.');
        }

        // 1. Ambil data Header Quotation, Customer, dan Staff (Logika Asli)
        // UBAH Query SQL Anda menjadi seperti ini (Tanpa JOIN staff):
        $quot = \DB::selectOne("
        SELECT q.*, 
            c.nama AS nama_customer, c.alamat AS alamat_customer, c.no_hp AS telp_customer
        FROM quotation q
        JOIN customer c ON q.id_customer = c.id_customer
        WHERE q.id_quotation = ?
        ", [$id_quotation]);

        if (!$quot) {
            abort(404, 'Quotation tidak ditemukan.');
        }

        // Konversi objek ke array agar persis native database bawaanmu
        $quot = (array) $quot;

        // 2. Ambil data detail item di dalam Quotation (Logika Asli)
        // 2. Ambil data detail item di dalam Quotation
// 2. Ambil data detail item di dalam Quotation (Gunakan COALESCE)
$items = \DB::select("
SELECT dq.*, COALESCE(p.nama_bentuk, dq.nama_produk_history) AS nama_bentuk
FROM detail_quotation dq
LEFT JOIN produk p ON dq.id_produk = p.id_produk
WHERE dq.id_quotation = ?
ORDER BY dq.id_detail ASC
", [$id_quotation]);

        // Konversi item ke array
        $items = array_map(function($item) {
            return (array) $item;
        }, $items);

        return view('admin.quotation.print', compact('id_quotation', 'quot', 'items'));
    }
}