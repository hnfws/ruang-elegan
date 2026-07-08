@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-md-6">
        <h3>Tambah Item ke Quotation #{{ $quot->no_quotation }}</h3>
        <form action="{{ route('admin.quotation.items.store', $quot->id_quotation) }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Pilih Produk Master</label>
                <select name="id_produk" id="selProduk" class="form-control" onchange="updatePreview()" required>
                    <option value="">-- Pilih --</option>
                    @foreach($produk_list as $p)
                        <option value="{{ $p->id_produk }}" data-harga="{{ $p->harga_jual }}">{{ $p->nama_bentuk }} (Rp {{ number_format($p->harga_jual) }})</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Kuantitas (Qty)</label>
                <input type="number" name="qty" id="inputQty" value="1" min="1" class="form-control" oninput="updatePreview()" required>
            </div>
            <div class="alert alert-info">
                Subtotal Estimasi: <span id="subtotalPreview" style="font-weight:bold;">Rp 0</span>
            </div>
            <button type="submit" class="btn btn-primary">Masukkan ke Daftar</button>
        </form>
    </div>
</div>

<script>
function updatePreview() {
    const sel = document.getElementById('selProduk');
    const qty = parseFloat(document.getElementById('inputQty').value) || 0;
    const opt = sel.options[sel.selectedIndex];
    const harga = opt ? parseFloat(opt.getAttribute('data-harga') || 0) : 0;
    const sub = qty * harga;

    document.getElementById('subtotalPreview').textContent = "Rp " + new Intl.NumberFormat('id-ID').format(Math.round(sub));
}
</script>
@endsection