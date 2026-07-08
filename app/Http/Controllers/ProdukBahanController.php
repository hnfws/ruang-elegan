<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\ProdukBahan;
use App\Models\BahanBaku; // Pastikan namespace model ini sudah di-import
use Illuminate\Support\Facades\DB;

class ProdukBahanController extends Controller
{
    /**
     * Menghitung ulang total kuantitas bahan yang digunakan oleh produk.
     */
    private function recalcProduk($id_produk) {
        $produk = Produk::findOrFail($id_produk);
        // Sesuaikan jika Anda mengelola total kalkulasi harga di sini nantinya
    }

    /**
     * Halaman Rincian & Tambah Komponen Bahan
     */
    public function create($id)
    {
        // 1. Ambil data master produk
        $produk = Produk::findOrFail($id);

        // 2. Ambil daftar bahan baku untuk dropdown select
        $bahan_list = BahanBaku::orderBy('nama_bahan', 'asc')->get();

        // 3. Ambil komponen bahan terdaftar dengan LEFT JOIN + COALESCE
        $produk_bahan = DB::table('produk_bahan as pb')
            ->leftJoin('bahan_baku as b', 'pb.id_bahanbaku', '=', 'b.id_bahanbaku')
            ->where('pb.id_produk', $id)
            ->orderBy('pb.urutan', 'asc')
            ->select(
                'pb.*', 
                DB::raw('COALESCE(b.nama_bahan, pb.nama_bahan_history) as nama_bahan'),
                DB::raw('COALESCE(b.satuan, pb.satuan_history) as satuan'),
                DB::raw('COALESCE(b.merk, pb.merk_history) as merk'),
                DB::raw('COALESCE(b.jenis, pb.jenis_history) as jenis')
            )
            ->get();

        return view('estimator.produk.add', compact('produk', 'bahan_list', 'produk_bahan'));
    }

    /**
     * Proses Simpan Komponen Bahan ke Produk
     */
    public function store(Request $request, $id) {
        $request->validate([
            'id_bahanbaku' => 'required',
            'qty'          => 'required|numeric|min:0.0001',
        ]);

        // 1. Ambil data masternya untuk disalin ke history
        $masterBahan = DB::table('bahan_baku')->where('id_bahanbaku', $request->id_bahanbaku)->first();

        if (!$masterBahan) {
            return redirect()->back()->with('error', 'Bahan baku tidak ditemukan!');
        }

        // 2. Simpan ke database sekaligus kunci teks aslinya ke history (Denormalisasi)
        DB::table('produk_bahan')->insert([
            'id_produk'          => $id,
            'id_bahanbaku'       => $request->id_bahanbaku,
            'qty'                => $request->qty, 
            'urutan'             => 0, // Proteksi jika kolom urutan di DB berstatus NOT NULL
            'nama_bahan_history' => $masterBahan->nama_bahan,
            'merk_history'       => $masterBahan->merk,
            'jenis_history'      => $masterBahan->jenis,
            'satuan_history'     => $masterBahan->satuan,
        ]);

        $this->recalcProduk($id); 

        return redirect()->back()->with('notif', 'Bahan baku berhasil ditambahkan ke produk!');
    }

    /**
     * Proses Hapus Komponen Bahan
     */
    public function destroy($id, $urutan) {
        DB::table('produk_bahan')->where('urutan', $urutan)->where('id_produk', $id)->delete();
        $this->recalcProduk($id);
        return redirect()->back()->with('notif', 'Komponen berhasil dihapus!');
    }
    
    /**
     * Form Edit Komponen
     */
    public function edit($id, $urutan)
    {
        $produk = Produk::findOrFail($id);

        $pb_data = ProdukBahan::where('id_produk', $id)
                              ->where('urutan', $urutan)
                              ->firstOrFail();

        $bahan_list = BahanBaku::orderBy('nama_bahan', 'asc')->get();

        return view('estimator.produk.pb-edit', compact('produk', 'pb_data', 'bahan_list'));
    }

    /**
     * Proses Update Komponen Bahan
     */
    public function update(Request $request, $id, $urutan)
    {
        $request->validate([
            'id_bahanbaku' => 'required',
            'qty'          => 'required|numeric|min:0.0001',
        ]);

        $masterBahan = DB::table('bahan_baku')->where('id_bahanbaku', $request->id_bahanbaku)->first();

        if (!$masterBahan) {
            return redirect()->back()->with('error', 'Bahan baku master tidak ditemukan!');
        }

        // Update data komponen utama beserta history-nya
        DB::table('produk_bahan')
            ->where('id_produk', $id)
            ->where('urutan', $urutan)
            ->update([
                'id_bahanbaku'       => $request->id_bahanbaku,
                'qty'                => $request->qty,
                'nama_bahan_history' => $masterBahan->nama_bahan,
                'merk_history'       => $masterBahan->merk,
                'jenis_history'      => $masterBahan->jenis,
                'satuan_history'     => $masterBahan->satuan,
            ]);

        $this->recalcProduk($id);

        return redirect()->route('estimator.pb.create', $id)->with('notif', 'Komponen bahan baku berhasil diubah!');
    }
}