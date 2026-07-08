<?php

namespace App\Http\Controllers;

use App\Models\Quotation;
use App\Models\DetailQuotation;
use App\Models\Produk;
use Illuminate\Http\Request;

class DetailQuotationController extends Controller {
    public function index($id_quotation) {
        $quot = Quotation::with(['customer'])->findOrFail($id_quotation);
        $items = DetailQuotation::with('produk')->where('id_quotation', $id_quotation)->get();
        return view('admin.quotation.items.index', compact('quot', 'items'));
    }

    public function create($id_quotation) {
        $quot = Quotation::with('customer')->findOrFail($id_quotation);
        $produk_list = Produk::orderBy('nama_bentuk')->get(); // Mengambil data produk master aktif
        return view('admin.quotation.items.create', compact('quot', 'produk_list'));
    }

    public function store(Request $request, $id_quotation) {
        $quot = Quotation::findOrFail($id_quotation);
        $produk = Produk::findOrFail($request->id_produk);
    
        $qty = floatval($request->qty);
        $harga_satuan = floatval($produk->harga_jual);
    
        // PERBAIKAN: Masukkan field subtotal dan nama_produk_history
        DetailQuotation::create([
            'id_quotation'        => $id_quotation,
            'id_produk'           => $request->id_produk,
            'nama_produk_history' => $produk->nama_bentuk, // <-- KUNCI NAMA PRODUK DI SINI
            'qty'                 => $qty,
            'harga_satuan'        => $harga_satuan,
            'subtotal'            => $qty * $harga_satuan 
        ]);
    
        // Rekalkulasi total harga di tabel header master quotation
        $quot->recalculateTotal();
    
        return redirect()->route('admin.quotation.items.index', $id_quotation)
            ->with('notif_success', 'Item rincian berhasil ditambahkan!');
    }

    public function edit($id_detail) {
        $detail = DetailQuotation::with('produk')->findOrFail($id_detail);
        return view('admin.quotation.items.edit', compact('detail'));
    }

    public function update(Request $request, $id_detail) {
        $detail = DetailQuotation::findOrFail($id_detail);
        $qty = floatval($request->qty);
        
        // Ambil selalu harga jual terkini dari master produk
        $harga = floatval($detail->produk->harga_jual);
    
        $detail->update([
            'qty' => $qty,
            'harga_satuan' => $harga, 
            'subtotal' => $qty * $harga
        ]);
    
        $detail->quotation->recalculateTotal();
    
        return redirect()->route('admin.quotation.items.index', $detail->id_quotation)
            ->with('notif_success', 'Item rincian berhasil diperbarui!');
    }


    public function destroy($id_quotation, $id_detail) {
        $detail = DetailQuotation::where('id_detail', $id_detail)->where('id_quotation', $id_quotation)->firstOrFail();
        $detail->delete();

        $quot = Quotation::findOrFail($id_quotation);
        $quot->recalculateTotal();

        return redirect()->route('admin.quotation.items.index', $id_quotation)
            ->with('notif_success', 'Item berhasil dihapus dari daftar.');
    }
}