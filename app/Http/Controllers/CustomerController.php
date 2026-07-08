<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    // Fungsi index yang kemarin sudah dibuat...
    public function index()
    {
        $customers = DB::table('customer')->orderBy('id_customer', 'desc')->get();
        return view('admin.customer.index', compact('customers'));
    }

    /**
     * 1. Menampilkan Halaman Form Tambah Customer
     */
    public function create()
    {
        return view('admin.customer.create');
    }

    /**
     * 2. Memproses Simpan Data Customer Baru ke Database
     */
    public function store(Request $request)
    {
        // Validasi input data terlebih dahulu agar aman
        $request->validate([
            'nama'   => 'required|string|max:255',
            'no_hp'  => 'required|string|max:20',
            'alamat' => 'required|string',
            'kota'   => 'required|string|max:100',
        ]);

        // Query Insert menggunakan DB Facade Laravel (Menggantikan INSERT INTO lama)
        DB::table('customer')->insert([
            'nama'   => $request->nama,
            'no_hp'  => $request->no_hp,
            'alamat' => $request->alamat,
            'kota'   => $request->kota,
        ]);

        // Mengirimkan notifikasi sukses (Menggantikan $_SESSION['notif'] lama)
        return redirect()->route('admin.customer.index')
                         ->with('notif', "Customer baru bernama '{$request->nama}' berhasil disimpan!");
    }
    /**
     * 3. Menampilkan Halaman Form Edit Customer dengan Data Lama
     */
    public function edit($id)
    {
        // Mengambil data customer berdasarkan id_customer (seperti SELECT * FROM customer WHERE id_customer = ...)
        $customer = DB::table('customer')->where('id_customer', $id)->first();

        // Jika data customer tidak ditemukan, kembalikan ke halaman utama customer
        if (!$customer) {
            return redirect()->route('admin.customer.index')->with('error', 'Data customer tidak ditemukan.');
        }

        // Kirim data customer ke file blade edit
        return view('admin.customer.edit', compact('customer'));
    }

    /**
     * 4. Memproses Update Data Customer ke Database
     */
    public function update(Request $request, $id)
    {
        // Validasi input data
        $request->validate([
            'nama'   => 'required|string|max:255',
            'no_hp'  => 'required|string|max:20',
            'alamat' => 'required|string',
            'kota'   => 'required|string|max:100',
        ]);

        // Proses Update ke database berdasarkan id_customer
        DB::table('customer')->where('id_customer', $id)->update([
            'nama'   => $request->nama,
            'no_hp'  => $request->no_hp,
            'alamat' => $request->alamat,
            'kota'   => $request->kota,
        ]);

        // Mengembalikan dengan notifikasi sukses ke halaman index
        return redirect()->route('admin.customer.index')
                         ->with('notif', 'Data Customer berhasil diperbarui!');
    }
    /**
     * 5. Memproses Hapus Data Customer dari Database
     */
    public function destroy($id)
    {
        // Mencari data customer berdasarkan id_customer terlebih dahulu
        $customer = DB::table('customer')->where('id_customer', $id)->first();

        // Jika data tidak ditemukan, kembalikan dengan pesan error
        if (!$customer) {
            return redirect()->route('admin.customer.index')
                             ->with('error', 'Data customer gagal dihapus karena tidak ditemukan.');
        }

        // Proses Delete dari database (Menggantikan DELETE FROM lama)
        DB::table('customer')->where('id_customer', $id)->delete();

        // Mengembalikan ke halaman utama customer dengan notifikasi sukses
        return redirect()->route('admin.customer.index')
                         ->with('notif', "Data Customer sukses dihapus.");
    }
}