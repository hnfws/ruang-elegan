@extends('estimator.layouts.app')

@section('title', 'Kelola Komponen Produk #' . $produk->id_produk)

{{-- Trik CSS Khusus Form Material agar Label Melayang Sempurna --}}
@push('styles')
<style>
    /* 1. Paksa form-group menggunakan posisi relatif standar */
    .form-material .form-group {
        position: relative !important;
        margin-bottom: 30px !important;
    }

    /* 2. Saat input/select aktif atau terisi, paksa LABEL naik ke atas */
    .form-material .form-control:focus ~ label,
    .form-material .form-control:valid ~ label,
    .form-material select.form-control ~ label {
        top: -8px !important; /* Jarak pas dari garis horizontal */
        font-size: 12px !important;
        color: #8DA432 !important; /* Warna Hijau Menu Aktif Sidebar */
        opacity: 1 !important;
        font-weight: 600 !important;
    }

    /* 3. Atur posisi dasar label saat input masih kosong agar tepat di tengah kotak */
    .form-material .form-group label {
        position: absolute !important;
        left: 0 !important;
        top: 8px !important;
        transition: all 0.2s ease-in-out !important;
        pointer-events: none !important;
        color: #999 !important;
    }
</style>
@endpush

@section('content')
<div class="row page-title clearfix">
    <div class="page-title-left">
        <h5 class="mr-0 mr-r-5">Edit Komponen Bahan Baku</h5>
        <p class="mr-0 text-muted d-none d-md-inline-block">Produk Utama: <strong>{{ $produk->nama_bentuk }}</strong></p>
    </div>
</div>

<div class="widget-list">
    <div class="row">
        <div class="col-md-12 widget-holder">
            <div class="widget-bg">
                <div class="widget-body clearfix">
                    <h5 class="box-title mr-b-30">Ubah Parameter Komponen</h5>
                    
                    <form class="form-material" action="{{ route('estimator.pb.update', [$produk->id_produk, $pb_data->urutan]) }}" method="POST" id="formBahan">
                        @csrf
                        
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    {{-- PERBAIKAN: Option pertama dikosongkan agar mekanisme label placeholder bawaan CSS berfungsi --}}
                                    <select name="id_bahanbaku" id="id_bahanbaku" class="form-control" required>
                                        <option value="" disabled selected hidden></option>
                                        @foreach($bahan_list as $bahan)
                                            <option value="{{ $bahan->id_bahanbaku }}" 
                                                    {{ $pb_data->id_bahanbaku == $bahan->id_bahanbaku ? 'selected' : '' }}>
                                                {{ $bahan->nama_bahan }} 
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="id_bahanbaku">Pilih Bahan Baku</label>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input type="number" name="qty" id="qty" class="form-control" value="{{ $pb_data->qty }}" min="1" required>
                                    <label for="qty">Kuantitas (Qty)</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-actions btn-list mr-t-10">
                            <button type="submit" class="btn btn-primary btn-rounded ripple">Simpan Perubahan</button>
                            <a href="{{ route('estimator.pb.create', $produk->id_produk) }}" class="btn btn-default btn-rounded ripple">Kembali</a>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const selectBahan = document.getElementById('id_bahanbaku');
    const inputQty = document.getElementById('qty');

    // Mengambil data nilai dimensi lama yang tersimpan di JSON database

    // --- 1. FUNGSI HITUNG OTOMATIS REAL-TIME ---


    // --- 2. GENERATE INPUT DIMENSI PARAMETER ---


});
</script>
@endpush