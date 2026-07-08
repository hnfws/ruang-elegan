<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use Illuminate\Support\Facades\DB;

class ProdukController extends Controller
{
    public function index() {
        $produk = Produk::orderBy('id_produk', 'desc')->get();
        return view('estimator.produk.index', compact('produk'));
    }

    public function create() {
        return view('estimator.produk.create');
    }

    public function store(Request $request) {
        // 1. Validasi input secara ketat
        $request->validate([
            'nama_bentuk' => 'required|string|max:100',
            'faktor_kesulitan' => 'required|numeric',
            'harga_jual' => 'required|numeric',
            'gambar_produk' => 'required|file|mimes:jpeg,png,jpg,gif,webp,jfif,heic,heif|max:10240',
        ]);
    
        $pathGambar = null;
        
        // 2. Ambil file dan buat nama yang pendek agar muat di varchar(100)
        if ($request->hasFile('gambar_produk')) {
            $file = $request->file('gambar_produk');
            
            // Contoh nama: prod_171892345.jpg (Sangat pendek & aman untuk database Anda)
            $namaFileUnik = 'prod_' . time() . '.' . $file->getClientOriginalExtension();
            
            // Simpan ke folder 'storage/app/public/produk' dengan nama custom tersebut
            $pathGambar = $file->storeAs('produk', $namaFileUnik, 'public');
        }
    
        // 3. Simpan ke database
        $produk = Produk::create([
            'nama_bentuk' => $request->nama_bentuk,
            'faktor_kesulitan' => $request->faktor_kesulitan,
            'harga_jual' => $request->harga_jual,
            'status' => 'draft',
            'gambar_produk' => $pathGambar // Isinya hanya "produk/prod_171892345.jpg" (Pasti muat)
        ]);
    
        // 4. Redirect ke halaman berikutnya
        return redirect()->route('estimator.pb.create', $produk->id_produk)
                         ->with('notif', 'Produk utama berhasil dibuat! Silakan lengkapi komponen bahannya.');
    }

    public function edit($id) {
        $data_produk = Produk::findOrFail($id);

        // Ambil data ENUM status dari tabel produk untuk drop-down
        $results_status = DB::select("SHOW COLUMNS FROM produk LIKE 'status'");
        $enum_status = [];
        if (!empty($results_status)) {
            $type = $results_status[0]->Type;
            preg_match('/^enum\((.*)\)$/', $type, $matches);
            if (isset($matches[1])) {
                foreach (explode(',', $matches[1]) as $value) {
                    $enum_status[] = trim($value, "'");
                }
            }
        }

        return view('estimator.produk.edit', compact('data_produk', 'enum_status'));
    }

    public function update(Request $request, $id) {
        $produk = Produk::findOrFail($id);
        
        // 1. Tambahkan validasi field harga_jual dan faktor_kesulitan agar aman
        $request->validate([
            'nama_bentuk' => 'required',
            'faktor_kesulitan' => 'required|numeric',
            'harga_jual' => 'required|numeric',
            'status' => 'required',
            'gambar_produk' => 'nullable|image|mimes:jpeg,png,jpg|max:2048' // Opsional saat edit
        ]);

        $pathGambar = $produk->gambar_produk; // Pakai path gambar lama sebagai default

        // 2. Jika estimator mengunggah gambar baru, ganti gambar lamanya
        if ($request->hasFile('gambar_produk')) {
            
            // Hapus fisik file gambar lama dari Storage (jika ada) demi menghemat space server
            if ($produk->gambar_produk && \Storage::disk('public')->exists($produk->gambar_produk)) {
                \Storage::disk('public')->delete($produk->gambar_produk);
            }

            // Simpan gambar baru menggunakan metode disk public (Sama seperti fungsi store)
            $pathGambar = $request->file('gambar_produk')->store('produk', 'public');
        }

        // 3. Simpan semua perubahan data termasuk harga_jual terbaru dari form manual
        $produk->update([
            'nama_bentuk' => $request->nama_bentuk,
            'faktor_kesulitan' => $request->faktor_kesulitan,
            'harga_jual' => $request->harga_jual, // Pastikan ini ditambahkan agar nilai harga_jual bisa diupdate
            'status' => $request->status, 
            'gambar_produk' => $pathGambar
        ]);

        // --- LOGIKA REDIRECT: Jika status berubah jadi 'acc' ---
        if ($request->status == 'acc') {
            return redirect()->route('admin.quotation.create', $id)
                             ->with('notif', 'Status disetujui (ACC)! Diarahkan otomatis ke cetak Quotation.');
        }

        return redirect()->route('estimator.produk.index')->with('notif', 'Data produk berhasil diubah!');
    }

    public function destroy($id)
    {
        // 1. Cari data produk yang akan dihapus
        $produk = Produk::findOrFail($id);
    
        // 2. HAPUS ATAU HILANGKAN perintah update(['id_produk' => null]) yang error kemarin!
        // Biarkan id_produk tetap apa adanya di detail_quotation karena riwayat teks 
        // nama produknya sekarang sudah aman dibaca dari kolom 'nama_produk_history'.
        
        // 3. Hapus gambar produk fisik dari folder public (Logika bawaanmu)
        if ($produk->gambar_produk) {
            $pathLama = public_path('images/' . $produk->gambar_produk);
            if (file_exists($pathLama)) {
                @unlink($pathLama);
            }
        }
    
        // 4. Jalankan perintah delete
        // PERHATIAN: Jika di Model Produk.php kamu menggunakan `use SoftDeletes`, 
        // baris ini akan aman (produk disembunyikan, relasi quotation tidak akan terputus).
        $produk->delete(); 
    
        return redirect()->route('estimator.produk.index')
                         ->with('notif', 'Produk berhasil dihapus! Seluruh data transaksi pada quotation masa lalu tetap utuh dan aman.');
    }

    public function printQuotation($id) {
        $produk = Produk::findOrFail($id);
        
        // Gunakan LEFT JOIN agar jika id_bahanbaku di tabel b sudah dihapus, 
        // baris produk_bahan (pb) KAMU TIDAK AKAN IKUT HILANG dari hasil query!
        $bahan = DB::table('produk_bahan as pb')
                    ->leftJoin('bahan_baku as b', 'pb.id_bahanbaku', '=', 'b.id_bahanbaku')
                    ->select(
                        'pb.*', 
                        // COALESCE artinya: Jika b.nama_bahan bernilai NULL (karena dihapus), 
                        // maka otomatis pakai nilai dari pb.nama_bahan_history
                        DB::raw('COALESCE(b.nama_bahan, pb.nama_bahan_history) as nama_bahan'),
                        DB::raw('COALESCE(b.satuan, pb.satuan_history) as satuan')
                    )
                    ->where('pb.id_produk', $id)
                    ->orderBy('pb.urutan', 'asc')
                    ->get();
    
        $total_hpp_bahan = 0; 
    
        return view('estimator.produk.final_save', compact('produk', 'bahan', 'total_hpp_bahan'));
    }
}