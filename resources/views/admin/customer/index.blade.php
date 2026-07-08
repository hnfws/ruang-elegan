@extends('admin.layouts.app')

@section('title', 'Data Customer')

@push('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
@endpush

@section('content')
<div class="widget-list">
                    <div class="row">
                        <div class="col-md-12 widget-holder">
                            <div class="widget-bg">
                                <div class="widget-heading clearfix">
                                    <h5>Daftar Master Customer</h5>
                                    <div class="float-right">
                                        <a href="{{ route('admin.customer.create') }}" class="btn btn-primary btn-sm btn-rounded ripple fw-600">
                                            <i class="material-icons list-icon" style="font-size:16px; vertical-align:middle;">add</i> Tambah Customer
                                        </a>
                                    </div>
                                </div>
                                <div class="widget-body clearfix">
                                    <div class="table-responsive">
                                        <table class="table" id="sampleTable">
                                            <thead>
                                                <tr>
                                                    <th style="width: 80px;">ID</th>
                                                    <th>Nama</th>
                                                    <th>No Hp</th>
                                                    <th>Role</th>
                                                    <th>Kota</th>

                                                    <th class="text-center" style="width: 50px;">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                    <tr>
                                        @if($customers->isNotEmpty())
                                    @foreach($customers as $row)
                                    <tr>
                                        <td>{{ $row->id_customer }}</td>
                                        <td>{{ $row->nama }}</td>
                                        <td>{{ $row->no_hp }}</td>
                                        <td>{{ $row->alamat }}</td>
                                        <td>{{ $row->kota }}</td>
                        

                        <td class="text-center">
                            <div class="dropdown">
                                <button class="btn-ellipsis ripple" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons" style="font-size: 20px; vertical-align: middle;">more_vert</i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
    
    <div class="btn-group">
    <a class="btn btn-xs btn-info shadow-none" href="{{ route('admin.customer.edit', $row->id_customer) }}">
        <i class="material-icons">edit</i> Edit
    </a>
    
    <a class="btn btn-xs btn-danger shadow-none text-white" 
       href="{{ route('admin.customer.destroy', $row->id_customer) }}" 
       onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');">
        <i class="material-icons text-white">delete</i> Hapus
    </a>
</div>

                            </div>
                                @endforeach
                            @endif
                            </div>
                        </div>
                    </div>
                </div>
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.15/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#sampleTable').DataTable();
        });
    </script>
@endpush