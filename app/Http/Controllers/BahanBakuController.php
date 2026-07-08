<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Menggunakan Query Builder agar mirip native lamamu
use App\Models\BahanBaku; // <-- TAMBAHKAN BARIS INI

class BahanBakuController extends Controller
{
    public function index()
    {
        // Menggunakan Model agar Soft Delete berfungsi (data terhapus otomatis disembunyikan)
        $bahanBaku = BahanBaku::orderBy('id_bahanbaku', 'desc')->get();
        return view('estimator.bahanbaku.index', compact('bahanBaku'));
    }

    // Form Tambah
    // Form Tambah
    public function create()
    {
        // 1. Definisikan array pilihan satuan di sini
        $satuan_options = ['Lembar', 'Meter', 'Kg', 'Pcs', 'Roll', 'Box'];

        // 2. Kirimkan variabel $satuan_options ke dalam view menggunakan compact()
        return view('estimator.bahanbaku.create', compact('satuan_options'));
    }

    // Proses Simpan Tambah Data
    public function store(Request $request)
    {
        $request->validate([
            'nama_bahan' => 'required',
        ]);

        DB::table('bahan_baku')->insert([
            'nama_bahan' => $request->nama_bahan,
            'merk'       => $request->merk,
            'jenis'      => $request->jenis,
            'satuan'     => $request->satuan,
            'tebal_mm'   => $request->tebal_mm,
        ]);

        return redirect()->route('estimator.bahanbaku.index')
                         ->with('notif', "Bahan baku baru bernama '{$request->nama_bahan}' berhasil disimpan!");
    }



    // Form Edit
    public function edit($id)
    {
        // 1. Ambil data bahan baku berdasarkan ID
        $bahan = DB::table('bahan_baku')->where('id_bahanbaku', $id)->first();
        
        if (!$bahan) {
            return redirect()->route('estimator.bahanbaku.index')->with('notif', 'Data tidak ditemukan!');
        }

        // 2. Ambil isi opsi ENUM secara otomatis dari database
        $satuan_options = $this->getSatuanEnumValues();

        // 3. Kirim data bahan dan opsi satuan ke view edit
        return view('estimator.bahanbaku.edit', compact('bahan', 'satuan_options'));
    }

    /**
     * Fungsi pembantu (Helper) untuk mengambil isi ENUM kolom satuan
     */
/**
     * Fungsi pembantu (Helper) untuk mengambil isi ENUM kolom satuan
     */
    private function getSatuanEnumValues()
    {
        // PERBAIKAN: Langsung masukkan string murni tanpa DB::raw()
        $results = DB::select("SHOW COLUMNS FROM bahan_baku WHERE Field = 'satuan'");
        
        // Pastikan hasil query tidak kosong
        if (empty($results)) {
            return [];
        }

        $type = $results[0]->Type;
        
        // Ekstrak string enum('Lembar','Meter',...) menjadi array murni
        preg_match('/^enum\((.*)\)$/', $type, $matches);
        
        $enum = [];
        if (isset($matches[1])) {
            foreach(explode(',', $matches[1]) as $value){
                $enum[] = trim($value, "'");
            }
        }
        
        return $enum; // Mengembalikan array: ['Lembar', 'Meter', 'Kg', ...] sesuai DB
    }

    // Proses Update Data
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_bahan' => 'required',
        ]);

        DB::table('bahan_baku')->where('id_bahanbaku', $id)->update([
            'nama_bahan' => $request->nama_bahan,
            'merk'       => $request->merk,
            'jenis'      => $request->jenis,
            'satuan'     => $request->satuan,
            'tebal_mm'   => $request->tebal_mm,
        ]);

        return redirect()->route('estimator.bahanbaku.index')
                         ->with('notif', "Bahan baku bernama '{$request->nama_bahan}' berhasil diperbarui!");
    }

    // Proses Hapus Data (bb-delete.php)
    public function destroy($id) {
        $bahan = BahanBaku::findOrFail($id);
    
        // HAPUS SCRIPT UPDATE NULL DI SINI! 
        // Jangan di-set NULL agar id_bahanbaku di produk tetap tersimpan abadi
    
        // Baru hapus bahan bakunya (Proses Soft Delete)
        $bahan->delete();
    
        return redirect()->back()->with('notif', 'Bahan baku berhasil dihapus, komponen pada produk master tetap aman!');
    }
    
}
