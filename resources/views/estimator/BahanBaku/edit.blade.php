@extends('estimator.layouts.app')

@section('title', 'Edit Bahan Baku')

{{-- Trik CSS Khusus Form Material agar Label Melayang Sempurna --}}
@push('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
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
            <div class="widget-list">
                <div class="row">
                    <div class="col-md-12 widget-holder">
                        <div class="widget-bg">
                            <div class="widget-body clearfix">
                                <h5 class="box-title mr-b-0">Edit Master Bahan Baku</h5>
                                <p class="text-muted mr-b-30">Silakan perbarui data komponen bahan baku bawah ini</p>
                                
                                <form class="form-material" action="{{ route('estimator.bahanbaku.update', $bahan->id_bahanbaku) }}" method="POST">
                                    @csrf
                                    
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                {{-- PERBAIKAN: Placeholder dihapus dan ditambahkan atribut 'required' agar pemicu CSS :valid berfungsi --}}
                                                <input class="form-control" name="nama_bahan" id="l30" type="text" value="{{ $bahan->nama_bahan }}" required>
                                                <label for="l30">Nama Bahan</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <input class="form-control" name="merk" id="l31" type="text" value="{{ $bahan->merk }}" required>
                                                <label for="l31">Merk</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <input class="form-control" name="jenis" id="l32" type="text" value="{{ $bahan->jenis }}" required>
                                                <label for="l32">Jenis</label>
                                            </div>
                                        </div>
                                      
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                {{-- PERBAIKAN: Pembungkus .input-group dan ikon dilepas agar selektor CSS penarik label bekerja normal --}}
                                                <select class="form-control" name="satuan" id="l34" required>
                                                    <option value="" disabled selected hidden></option>
                                                    @foreach ($satuan_options as $satuan_option)    
                                                        <option value="{{ $satuan_option }}" {{ $bahan->satuan == $satuan_option ? 'selected' : '' }}>
                                                            {{ $satuan_option }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <label for="l34">Pilih Satuan</label>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <input class="form-control" name="tebal_mm" id="l35" type="number" step="0.01" value="{{ $bahan->tebal_mm }}" required>
                                                <label for="l35">Tebal (MM)</label>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-actions btn-list">
                                        <button class="btn btn-primary btn-rounded ripple" type="submit">Perbarui Bahan Baku</button>
                                        <a href="{{ route('estimator.bahanbaku.index') }}" class="btn btn-default btn-rounded ripple">Batal</a>
                                    </div>
                                </form>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection