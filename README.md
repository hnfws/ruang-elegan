# 🪑 Ruang Elegan

**Ruang Elegan** adalah sistem informasi manajemen untuk IKM (Industri Kecil Menengah) furnitur yang membantu proses estimasi harga bahan baku hingga pembuatan *quotation* untuk pelanggan. Aplikasi ini dibangun menggunakan **Laravel**.

## 👩‍💻 Tim Pengembang

Proyek ini dikembangkan oleh:

|   NIM   |           Nama           |
|---------|--------------------------|
| 1324073 | Muhana Fawwas Sausan     |
| 1324064 | Fatimah Nuraini          |
| 1324086 | Chandanara Nailakhansa   |

## 📖 Tentang Proyek

Ruang Elegan dikembangkan untuk mempermudah alur kerja bisnis furnitur, mulai dari perhitungan estimasi bahan baku dan harga produksi, hingga pembuatan penawaran (quotation) resmi kepada pembeli. Sistem ini memisahkan tanggung jawab pengguna ke dalam dua role agar proses kerja lebih terstruktur dan efisien.

## 👥 Role Pengguna

|      Role     |                                      Tanggung Jawab                                              |
|---------------|--------------------------------------------------------------------------------------------------|
| **Estimator** | Mengelola data bahan baku dan membuat estimasi harga produksi furnitur                           |
| **Admin**     | Membuat quotation berdasarkan hasil estimasi dan berkomunikasi/berurusan langsung dengan pembeli |

## ✨ Fitur Utama

- 🔐 Manajemen login dengan 2 role (Estimator & Admin)
- 📦 Pengelolaan data bahan baku
- 💰 Perhitungan estimasi harga produksi
- 📄 Pembuatan dan pengelolaan quotation untuk pelanggan
- 📊 Riwayat estimasi dan quotation

## 🛠️ Tech Stack

- Backend: Laravel (PHP)
- Database: MySQL
- Frontend: Blade Template, Bootstrap 4, jQuery
- UI Components/Plugin:
    ~ Material Icons
    ~ Font Awesome
    ~ DataTables (tabel data interaktif)
    ~ SweetAlert2 (alert & modal)
    ~ Metis Menu (sidebar menu)
    ~ Perfect Scrollbar
    ~ Google Fonts (Nunito Sans, Roboto, Open Sans)

## 🚀 Instalasi & Setup

Ikuti langkah-langkah berikut untuk menjalankan aplikasi ini secara lokal.

### 1. Clone Repository

```bash
git clone https://github.com/username/ruang-elegan.git
cd ruang-elegan
```

### 2. Install Dependency PHP

```bash
composer install
```

### 3. Install Dependency Frontend (jika menggunakan Vite/NPM)

```bash
npm install
npm run dev
```

### 4. Konfigurasi Environment

Salin file `.env.example` menjadi `.env`:

```bash
cp .env.example .env
```

Lalu sesuaikan konfigurasi database pada file `.env`:

### 5. Generate Application Key

```bash
php artisan key:generate
```

### 6. Migrasi & Seeder Database

Buat database `ruang_elegan` terlebih dahulu di MySQL, lalu jalankan:

```bash
php artisan migrate --seed
```

> Seeder akan membuat akun default untuk role **Estimator** dan **Admin** (silakan sesuaikan kredensial di `DatabaseSeeder.php`).

### 7. Jalankan Aplikasi

```bash
php artisan serve
```

Aplikasi dapat diakses melalui:

```
http://127.0.0.1:8000
```

## 📁 Struktur Role (Contoh Alur Kerja)

1. **Estimator** login → input/kelola bahan baku → membuat estimasi harga
2. **Admin** login → melihat hasil estimasi → membuat quotation → mengirim/mengelola quotation ke pembeli

## 📄 Lisensi

Proyek ini dibuat untuk keperluan tugas/akademik pemrograman berbasis web
