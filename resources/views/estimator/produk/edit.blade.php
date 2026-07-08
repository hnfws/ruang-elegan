@extends('estimator.layouts.app')

@section('title', 'Ubah Produk Master')

{{-- Trik CSS Khusus Form Material agar Label Melayang Sempurna --}}
@push('styles')
<style>
    /* 1. Paksa form-group menggunakan posisi relatif standar */
    .form-material .form-group {
        position: relative !important;
        margin-bottom: 30px !important;
    }

    /* 2. Saat input aktif, valid, atau select/file bertipe khusus, paksa LABEL naik ke atas */
    .form-material .form-control:focus ~ label,
    .form-material .form-control:valid ~ label,
    .form-material select.form-control ~ label,
    .form-material input[type="file"].form-control ~ label {
        top: -8px !important; /* Jarak pas dari garis horizontal atas */
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
        <h5 class="mr-0 mr-r-5">Ubah Data Produk</h5>
        <p class="mr-0 text-muted d-none d-md-inline-block">Silakan perbarui spesifikasi model produk utama di bawah ini</p>
    </div>
</div>

<div class="widget-list">
    <div class="row">
        <div class="col-md-12 widget-holder">
            <div class="widget-bg">
                <div class="widget-body clearfix">
                    <h5 class="box-title mr-b-30">Form Edit Produk</h5>
                    
                    <form class="form-material" action="{{ route('estimator.produk.update', $data_produk->id_produk) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input class="form-control" id="nama_bentuk" name="nama_bentuk" type="text" value="{{ $data_produk->nama_bentuk }}" required>
                                    <label for="nama_bentuk">Nama Bentuk / Model</label>
                                </div>
                            </div>
                            
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input class="form-control" id="faktor_kesulitan" name="faktor_kesulitan" type="number" step="0.01" value="{{ $data_produk->faktor_kesulitan }}" required>
                                    <label for="faktor_kesulitan">Faktor Kesulitan (Pengali Markup)</label>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input class="form-control" id="harga_jual" name="harga_jual" type="number" step="0.01" value="{{ $data_produk->harga_jual }}" required>
                                    <label for="harga_jual">Harga Jual / Nilai Penawaran (Rp)</label>
                                </div>
                            </div>
                            
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <select class="form-control" id="status" name="status" required>
                                        <option value="" disabled selected hidden></option>
                                        @foreach($enum_status as $st)
                                            <option value="{{ $st }}" {{ $data_produk->status == $st ? 'selected' : '' }}>
                                                {{ strtoupper($st) }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="status">Status Produk</label>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group mr-b-20">
                                    <input class="form-control" id="gambar_produk" name="gambar_produk" type="file" accept="image/*">
                                    <label for="gambar_produk">Ubah Foto / Desain Produk</label>
                                    
                                    @if($data_produk->gambar_produk)
                                        <div class="mr-t-15">
                                            <small class="text-muted d-block mr-b-5">Gambar saat ini:</small>
                                            <img src="{{ asset('storage/' . $data_produk->gambar_produk) }}" alt="Produk" style="max-height: 100px; border-radius: 4px;" class="img-thumbnail">
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-actions btn-list mr-t-10">
                            <button class="btn btn-primary btn-rounded ripple" type="submit">
                                Simpan Perubahan <i class="material-icons" style="font-size: 16px; vertical-align: middle; margin-left: 5px;">save</i>
                            </button>
                            <a href="{{ route('estimator.produk.index') }}" class="btn btn-default btn-rounded ripple">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection