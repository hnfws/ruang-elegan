@extends('admin.layouts.app')

@section('title', 'Edit Quotation')

@section('content')
<div class="row page-title-clearfix">
    <div class="page-title-caption">
        <h5 class="entry-title mt-0">Edit Master Quotation (#QT-{{ $quot->id_quotation }})</h5>
    </div>
</div>

<div class="widget-list">
    <div class="row">
        <div class="col-md-12 widget-holder">
            <div class="widget-bg">
                <div class="widget-body clearfix">
                    <form action="{{ route('admin.quotation.update', $quot->id_quotation) }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Pilih Customer</label>
                            <div class="col-md-9">
                                <select class="form-control" name="id_customer" required>
                                    @foreach($customers as $c)
                                        <option value="{{ $c->id_customer }}" {{ $quot->id_customer == $c->id_customer ? 'selected' : '' }}>
                                            {{ $c->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Tanggal Pembuatan</label>
                            <div class="col-md-9">
                                <input class="form-control" type="date" name="tgl_dibuat" value="{{ $quot->tgl_dibuat }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Diskon</label>
                            <div class="col-md-9">
                                <input class="form-control" type="number" name="diskon" value="{{ old('diskon', $quot->diskon ?? 0) }}" min="0" step="0.01" placeholder="Masukkan nominal potongan nego (contoh: 1000000)">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Total Harga</label>
                            <div class="col-md-9">
                                <input class="form-control" type="number" name="total_harga" value="{{ $quot->total_harga }}" required>
                            </div>
                        </div>

                        

                        <div class="form-actions btn-list style-actions" style="margin-top: 30px;">
                            <button class="btn btn-primary btn-rounded ripple" type="submit">Simpan Perubahan</button>
                            <a href="{{ route('admin.quotation.index') }}" class="btn btn-default btn-rounded ripple">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection