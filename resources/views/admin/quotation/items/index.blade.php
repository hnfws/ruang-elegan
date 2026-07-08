@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h3>Rincian Komponen Item Quotation: #{{ $quot->no_quotation }}</h3>
        <p>Customer: <strong>{{ $quot->customer->nama }}</strong> | Grand Total: <strong>Rp {{ number_format($quot->total_harga, 0, ',', '.') }}</strong></p>
        
        <a href="{{ route('admin.quotation.items.create', $quot->id_quotation) }}" class="btn btn-success mb-3">Tambah Item Produk</a>
        <a href="{{ route('admin.quotation.index') }}" class="btn btn-default mb-3">Kembali ke List</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama Produk</th>
                    <th>Qty</th>
                    <th>Harga Snapshot</th>
                    <th>Subtotal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                <tr>
                <td>{{ $item->produk->nama_bentuk ?? $item->nama_produk_history }}</td>                    
                <td>{{ $item->qty }}</td>
                    <td>Rp {{ number_format($item->harga_satuan, 0, ',', '.') }}</td>
                    <td>Rp {{ number_format($item->subtotal, 0, ',', '.') }}</td>
                    <td>
                        <a href="{{ route('admin.quotation.items.edit', $item->id_detail) }}" class="btn btn-warning btn-sm">Ubah Qty/Harga</a>
                        <form action="{{ route('admin.quotation.items.destroy', [$quot->id_quotation, $item->id_detail]) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus item ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection