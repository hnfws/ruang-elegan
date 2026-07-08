<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StaffController extends Controller
{
    // Fungsi index() yang sudah dibuat sebelumnya...
public function index()
    {
        // Mengambil semua data staff diurutkan dari yang terbaru
        $staff = DB::table('staff')->orderBy('id_staff', 'desc')->get();

        return view('admin.staff.index', compact('staff'));
    }
    /**
     * Menampilkan Form Tambah Staff
     */
    public function create()
    {
        // Mengambil nilai enum dari kolom 'role' secara dinamis seperti di file aslimu
        $roles = [];
        $result_roles = DB::select("SHOW COLUMNS FROM staff LIKE 'role'");
        
        if (!empty($result_roles)) {
            $type = $result_roles[0]->Type;
            if (preg_match("/^enum\((.*)\)$/", $type, $matches)) {
                $roles = explode(',', str_replace("'", "", $matches[1]));
            }
        }

        // Jika gagal mengambil enum secara otomatis, gunakan fallback default ini:
        if (empty($roles)) {
            $roles = ['admin', 'resepsionis', 'desainer', 'staf_gudang'];
        }

        return view('admin.staff.create', compact('roles'));
    }

    /**
     * Menyimpan Data Staff Baru ke Database
     */
    public function store(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'nama'  => 'required|string|max:255',
            'no_hp' => 'required|string|max:20',
            'role'  => 'required',
        ]);

        // Menyimpan data menggunakan Query Builder Laravel (Lebih aman dari SQL Injection)
        DB::table('staff')->insert([
            'nama'  => $request->nama,
            'no_hp' => $request->no_hp,
            'role'  => $request->role,
        ]);

        // Mengalihkan kembali ke halaman utama staff dengan pesan sukses
        return redirect()->route('admin.staff.index')->with('notif', "Staff baru bernama '{$request->nama}' berhasil disimpan!");
    }
    /**
     * Menampilkan Form Edit Staff
     */
    public function edit($id)
    {
        // Ambil data staff berdasarkan ID
        $staff = DB::table('staff')->where('id_staff', $id)->first();

        if (!$staff) {
            return redirect()->route('admin.staff.index')->with('error', 'Data staff tidak ditemukan.');
        }

        // Ambil nilai enum untuk pilihan role
        $roles = [];
        $result_roles = DB::select("SHOW COLUMNS FROM staff LIKE 'role'");
        if (!empty($result_roles)) {
            $type = $result_roles[0]->Type;
            if (preg_match("/^enum\((.*)\)$/", $type, $matches)) {
                $roles = explode(',', str_replace("'", "", $matches[1]));
            }
        }

        if (empty($roles)) {
            $roles = ['admin', 'resepsionis', 'desainer', 'staf_gudang'];
        }

        return view('admin.staff.edit', compact('staff', 'roles'));
    }

    /**
     * Menyimpan Perubahan Data Staff
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama'  => 'required|string|max:255',
            'no_hp' => 'required|string|max:20',
            'role'  => 'required',
        ]);

        DB::table('staff')->where('id_staff', $id)->update([
            'nama'  => $request->nama,
            'no_hp' => $request->no_hp,
            'role'  => $request->role,
        ]);

        return redirect()->route('admin.staff.index')->with('notif', 'Data staff berhasil diperbarui!');
    }

    /**
     * Menghapus Data Staff
     */

    /**
     * Menghapus Data Staff dari Database
     */
    public function destroy($id)
    {
        // 1. Eksekusi query hapus menggunakan Query Builder Laravel
        DB::table('staff')->where('id_staff', $id)->delete();

        // 2. Alihkan kembali ke halaman utama tabel dengan membawa notifikasi sukses
        return redirect()->route('admin.staff.index')->with('notif', 'Data staff berhasil dihapus!');
    }
}