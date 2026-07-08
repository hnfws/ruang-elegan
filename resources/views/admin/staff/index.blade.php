@extends('admin.layouts.app')

@section('title', 'Data Staff')

@push('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
@endpush

@section('content')

        <!-- /.site-sidebar -->
        <div class="row page-title-clearfix">
                    <div class="page-title-caption">
                    </div>
                </div>

@if(session('notif'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&#215;</span></button>
                        <strong>Sistem Info:</strong> {{ session('notif') }}
                    </div>
                @endif

                <div class="widget-list">
                    <div class="row">
                        <div class="col-md-12 widget-holder">
                            <div class="widget-bg">
                                <div class="widget-heading clearfix">
                                    <h5>Daftar Master Staff</h5>
                                    <div class="float-right">
                                        <a href="{{ route('admin.staff.create') }}" class="btn btn-primary btn-sm btn-rounded ripple fw-600">
                                            <i class="material-icons list-icon" style="font-size:16px; vertical-align:middle;">add</i> Tambah Staff
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

                    <th class="text-center" style="width: 50px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                    <tr>
                                        @forelse($staff as $row)

</tr>
                        <td><strong>{{ $row->id_staff }}</strong></td>
                        <td>{{ $row->nama }}</td>
                        <td><span class="text-muted">{{ $row->no_hp }}</span></td>
                        <td><strong> {{ $row->role }}</strong></td>
                        

                        <td class="text-center">
                            <div class="dropdown">
                                <button class="btn-ellipsis ripple" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons" style="font-size: 20px; vertical-align: middle;">more_vert</i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
    
    <a class="dropdown-item" href="{{ route('admin.staff.edit', $row->id_staff) }}">
        <i class="material-icons">edit</i> Edit
    </a>
    
    <div class="dropdown-divider" style="border-top: 1px solid #edf2f7;"></div>
    
    <a class="dropdown-item text-danger" href="{{ route('admin.staff.delete', $row->id_staff) }}" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');">
        <i class="material-icons text-danger">delete</i> Hapus
    </a>
</div>
                            </div>
                                                            
@empty
                        </div>
                        @endforelse
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