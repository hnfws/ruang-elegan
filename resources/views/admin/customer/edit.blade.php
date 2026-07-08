@extends('admin.layouts.app')

@section('title', 'Edit Data Customer')

{{-- Trik CSS Tambahan untuk Memaksa Label Naik Saat Diisi/Diklik --}}
@push('styles')
<style>
    /* 1. Paksa form-group menggunakan posisi relatif standar */
    .form-material .form-group {
        position: relative !important;
        margin-bottom: 25px !important;
    }

    /* 2. Saat input diklik (focus) atau saat input valid/terisi (valid), paksa LABEL naik ke atas */
    .form-material .form-control:focus ~ label,
    .form-material .form-control:valid ~ label {
        top: -8px !important;
        font-size: 12px !important;
        color: #8DA432 !important; /* Warna hijau tema utama */
        opacity: 1 !important;
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
            <h5 class="mr-0 mr-r-5">Edit Customer</h5>
            <p class="mr-0 text-muted d-none d-md-inline-block">Perbarui data pelanggan Ruang Elegan</p>
        </div>
        <div class="page-title-right d-none d-sm-inline-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">Edit Customer</li>
            </ol>
        </div>
    </div>
    
    <div class="widget-list">
        <div class="row">
            <div class="col-md-12 widget-holder">
                <div class="widget-bg">
                    <div class="widget-body clearfix">
                        <h5 class="box-title mr-b-0">Form Edit Customer</h5>
                        <p class="text-muted">Silakan ubah data pada kolom di bawah ini</p>
                        
                        <form class="form-material" method="post" action="{{ route('admin.customer.update', $customer->id_customer) }}">
                            @csrf 
                            
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        {{-- Di halaman edit, hilangkan atribut placeholder agar label tidak bertumpuk dengan nilai bawaan --}}
                                        <input class="form-control" name="nama" id="l30" type="text" required value="{{ old('nama', $customer->nama) }}">
                                        <label for="l30">Nama Customer</label>
                                    </div>
                                </div>
                                
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input class="form-control" name="no_hp" id="l31" type="text" required value="{{ old('no_hp', $customer->no_hp) }}">
                                        <label for="l31">No. HP / WhatsApp</label>
                                    </div>
                                </div>
                                
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        {{-- PERBAIKAN: .input-group dan ikon <i class> pembawa bug sudah dibuang --}}
                                        <input class="form-control" name="alamat" id="l32" type="text" required value="{{ old('alamat', $customer->alamat) }}">
                                        <label for="l32">Alamat</label>
                                    </div>
                                </div>
                                
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        {{-- PERBAIKAN: .input-group pembawa bug sudah dibuang --}}
                                        <input class="form-control" name="kota" id="l33" type="text" required value="{{ old('kota', $customer->kota) }}">
                                        <label for="l33">Kota</label>
                                    </div>
                                </div>
                            </div>
                                    
                            <div class="form-actions btn-list mr-t-20">
                                <button class="btn btn-primary btn-rounded ripple" type="submit" name="submit_ubah">Simpan Perubahan</button>
                                <a href="{{ route('admin.customer.index') }}" class="btn btn-default btn-rounded ripple">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection