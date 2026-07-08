@extends('admin.layouts.app')

@section('title', 'Edit Data Staff')

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
<div class="widget-list">
    <div class="row">
        <div class="col-md-12 widget-holder">
            <div class="widget-bg">
                <div class="widget-body clearfix">
                    <h5 class="box-title mr-b-0">Form Edit Staff</h5>
                    <p class="text-muted mr-b-30">Ubah Informasi Data Staff</p>
                    
                    <form class="form-material" action="{{ route('admin.staff.update', $staff->id_staff) }}" method="post">
                        @csrf {{-- Token keamanan wajib Laravel --}}
                        
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    {{-- PERBAIKAN: Spasi enter di dalam value dibersihkan, placeholder dihapus agar tidak bentrok --}}
                                    <input class="form-control" name="nama" id="l30" type="text" value="{{ old('nama', $staff->nama) }}" required>
                                    <label for="l30">Nama Staff</label>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input class="form-control" name="no_hp" id="l31" type="number" value="{{ old('no_hp', $staff->no_hp) }}" required>
                                    <label for="l31">No. HP / WhatsApp</label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    {{-- PERBAIKAN: Pembungkus .input-group dan ikon dilepas agar CSS penarik label bekerja normal --}}
                                    <select class="form-control" name="role" id="l32" required>
                                        <option value="" disabled selected hidden></option>
                                        @foreach($roles as $value)
                                            <option value="{{ $value }}" @selected(old('role', $staff->role) == $value)>
                                                {{ ucwords(str_replace('_', ' ', $value)) }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="l32">Pilih Role</label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-actions btn-list mr-t-10">
                            <button class="btn btn-primary btn-rounded ripple" type="submit" name="submit_update">Perbarui Staff</button>
                            <a href="{{ route('admin.staff.index') }}" class="btn btn-default btn-rounded ripple">Batal</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection