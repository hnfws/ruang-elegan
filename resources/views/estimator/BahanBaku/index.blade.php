@extends('estimator.layouts.app')

@section('title', 'Data Bahan Baku')

@push('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
@endpush

@section('content')

        <!-- /.site-sidebar -->
        <div class="widget-list">
                    <div class="row">
                        <div class="col-md-12 widget-holder">
                            <div class="widget-bg">
                                <div class="widget-heading clearfix">
                                    <h5>Daftar Master Bahan Baku</h5>
                                    <div class="float-right">
                                        <a href="{{ route('estimator.bahanbaku.create') }}" class="btn btn-primary btn-sm btn-rounded ripple fw-600">
                                            <i class="material-icons list-icon" style="font-size:16px; vertical-align:middle;">add</i> Tambah Bahan Baku
                                        </a>
                                    </div>
                                </div>
                                                                <div class="widget-body clearfix">
    <div class="table-responsive">
        <table class="table" id="sampleTable">
            <thead>
                <tr>
                    <th>ID</th>
                                                <th>Nama Bahan</th>
                                                <th>Merk</th>
                                                <th>Jenis</th>
                                                <th>Satuan</th>
                                                <th>Tebal MM</th>

                    <th class="text-center" style="width: 50px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                    <tr>
                                        @forelse ($bahanBaku as $row)

</tr>
                        <td><strong>{{ $row->id_bahanbaku }}</strong></td>
                        <td>{{ $row->nama_bahan }}</td>
                        <td><span class="text-muted">{{ $row->merk }}</span></td>
                        <td><strong> {{ $row->jenis }}</strong></td>
                                                <td><strong> {{ $row->satuan }}</strong></td>
                                                <td><strong> {{ $row->tebal_mm }}</strong></td>
                                                

                        

                        <td class="text-center">
                            <div class="dropdown">
                                <button class="btn-ellipsis ripple" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons" style="font-size: 20px; vertical-align: middle;">more_vert</i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
    
    <a class="dropdown-item" href="{{ route('estimator.bahanbaku.edit', $row->id_bahanbaku) }}">
        <i class="material-icons">edit</i> Edit
    </a>
    
    <div class="dropdown-divider" style="border-top: 1px solid #edf2f7;"></div>
    
    <a class="dropdown-item text-danger" href="{{ route('estimator.bahanbaku.delete', $row->id_bahanbaku) }}" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');">
        <i class="material-icons text-danger">delete</i> Hapus
    </a>
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