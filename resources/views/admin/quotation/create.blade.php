@extends('admin.layouts.app')

@section('content')
<div class="widget-list">
                <div class="row">
                    <div class="col-md-12 widget-holder">
                        <div class="widget-bg">
                            <div class="widget-body clearfix">
                                <h5 class="box-title mr-b-0">Form quotation </h5>
                                <p class="text-muted">Tambah Quotation Baru</p>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
        <form action="{{ route('admin.quotation.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group">
                <select name="id_customer" class="form-control" required>
                    @foreach($customers as $c)
                        <option value="{{ $c->id_customer }}">{{ $c->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <input type="date" name="tgl_dibuat" value="{{ date('Y-m-d') }}" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Header & Lanjut</button>
        </form>
    </div>
</div>
</div>

@endsection