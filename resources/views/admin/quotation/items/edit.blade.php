@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-md-6">
        <h3>Ubah Kuantitas Item</h3>
        <p>Produk: <strong>{{ $detail->produk->nama_bentuk }}</strong></p>
        <form action="{{ route('admin.quotation.items.update', $detail->id_detail) }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Kuantitas (Qty)</label>
                <input type="number" name="qty" id="inputQty" value="{{ $detail->qty }}" class="form-control" oninput="updatePreview()" required>
            </div>

            <div class="alert alert-info">
                Kalkulasi Subtotal baru: <span id="subtotalPreview" style="font-weight:bold;">Rp 0</span>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
</div>

<script>
// Langsung kunci ke harga terbaru master produk
const HARGA_TERKINI = {{ $detail->produk->harga_jual }};

function updatePreview() {
    const qty = parseFloat(document.getElementById('inputQty').value) || 0;
    const sub = qty * HARGA_TERKINI;

    document.getElementById('subtotalPreview').textContent = "Rp " + new Intl.NumberFormat('id-ID').format(sub);
}

// Jalankan preview saat halaman pertama kali dimuat
document.addEventListener('DOMContentLoaded', updatePreview);
</script>
@endsection