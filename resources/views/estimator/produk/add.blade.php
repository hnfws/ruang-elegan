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
        <h5 class="mr-0 mr-r-5">Penyusunan Komponen Bahan Baku</h5>
        <p class="mr-0 text-muted d-none d-md-inline-block">Produk Utama: <strong>{{ $produk->nama_bentuk }}</strong> (Faktor: {{ $produk->faktor_kesulitan }})</p>
    </div>
</div>

<div class="widget-list">
    <div class="row">
        {{-- Sisi Kiri: Form Input Komponen Bahan --}}
        <div class="col-md-5 widget-holder">
            <div class="widget-bg">
                <div class="widget-body clearfix">
                    <h5 class="box-title mr-b-30">Tambah Komponen Bahan</h5>
                    
                    <form class="form-material" action="{{ route('estimator.pb.store', $produk->id_produk) }}" method="POST" id="formBahan">
                        @csrf
                        
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    {{-- PERBAIKAN: Option pertama dikosongkan agar mekanisme label placeholder CSS berfungsi normal --}}
                                    <select name="id_bahanbaku" id="id_bahanbaku" class="form-control" required>
                                        <option value="" disabled selected hidden></option>
                                        @foreach($bahan_list as $bahan)
                                            <option value="{{ $bahan->id_bahanbaku }}" {{ isset($pb_data) && $pb_data->id_bahanbaku == $bahan->id_bahanbaku ? 'selected' : '' }}>
                                                {{ $bahan->nama_bahan }} ({{ $bahan->satuan }}) {{ $bahan->merk ? '- ' . $bahan->merk : '' }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="id_bahanbaku">Pilih Bahan Baku</label>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input type="number" name="qty" id="qty" class="form-control" value="1" min="1" required>
                                    <label for="qty">Kuantitas (Qty)</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-actions btn-list">
                            <button type="submit" class="btn btn-primary btn-rounded btn-block ripple">Simpan Komponen Bahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- Sisi Kanan: Tabel Rincian Komponen Terpasang --}}
        <div class="col-md-7 widget-holder">
            <div class="widget-bg">
                <div class="widget-body clearfix">
                    <h5 class="box-title mr-b-20">Rincian Komponen Terpasang</h5>
                    
                    <div id="kotakBahanContainer" class="table-responsive">
                        <table class="table table-sm table-bordered">
                            <thead>
                                <tr>
                                    <th>Bahan Baku</th>
                                    <th style="width: 15%">Qty</th>
                                    <th style="width: 30%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($produk_bahan as $index => $pb)
                                    <tr>
                                        <td>
                                            <strong>{{ $pb->nama_bahan }}</strong>
                                        </td>
                                        <td>{{ $pb->qty }}</td>
                                        <td>
                                            <div class="btn-list">
                                                <a href="{{ route('estimator.pb.edit', ['id' => $produk->id_produk, 'urutan' => $pb->urutan ?? $index]) }}" class="btn btn-xs btn-info ripple">
                                                    <i class="material-icons" style="font-size: 14px; vertical-align: middle;">edit</i> Edit
                                                </a>

                                                <form action="{{ route('estimator.pb.destroy', [$produk->id_produk, $pb->urutan]) }}" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus komponen ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-xs btn-danger ripple">
                                                        <i class="material-icons" style="font-size: 14px; vertical-align: middle;">delete</i> Hapus
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center text-muted py-4">Belum ada komponen bahan yang dimasukkan.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        
                        <div class="mt-4 text-right mr-b-10">
                            <h4 class="mr-b-15">Grand Total Produk: <strong class="text-success">Rp {{ number_format($produk->harga_jual, 0, ',', '.') }}</strong></h4>
                            <a href="{{ route('estimator.produk.index') }}" class="btn btn-success btn-rounded ripple">
                                <i class="material-icons" style="font-size: 16px; vertical-align: middle; margin-right: 5px;">check_circle</i> Selesai & Simpan Master
                            </a>
                        </div>
                    </div>
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
    const formBahan = document.getElementById('formBahan');

    // --- 1. FUNGSI HITUNG OTOMATIS REAL-TIME ---

    // --- 2. GENERATE INPUT DIMENSI PARAMETER ---



    // --- 4. AJAX SUBMIT ---
    if (formBahan) {
        formBahan.addEventListener('submit', function(e) {
            e.preventDefault();
            let formData = new FormData(formBahan);

            fetch(formBahan.getAttribute('action'), {
                method: 'POST',
                body: formData,
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            })
            .then(response => {
                if (typeof $ !== 'undefined') {
                    $('#kotakBahanContainer').load(window.location.href + ' #kotakBahanContainer > *');
                } else {
                    window.location.reload(); 
                }
                
                if (selectBahan) selectBahan.value = '';
                if (inputQty) inputQty.value = "1";
                
                generateDimensiFields();
                alert('Komponen bahan baku berhasil disimpan!');
            })
            .catch(error => {
                alert('Terjadi kesalahan saat menyimpan data.');
                console.error(error);
            });
        });
    }
});
</script>
@endpush