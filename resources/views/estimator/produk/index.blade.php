@extends('estimator.layouts.app')

@section('title', 'Daftar Master Produk')

@push('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
@endpush

@section('content')

        <div class="widget-list">
                    <div class="row">
                        <div class="col-md-12 widget-holder">
                            <div class="widget-bg">
                                <div class="widget-heading clearfix">
                                    <h5>Daftar Master Produk</h5>
                                    <div class="float-right">
                                        <a href="{{ route('estimator.produk.create') }}" class="btn btn-primary btn-sm btn-rounded ripple fw-600">
                                            <i class="material-icons list-icon" style="font-size:16px; vertical-align:middle;">add</i> Tambah Produk
                                        </a>
                                    </div>
                                </div>
                                
                                @if(session('notif'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin: 20px 20px 0 20px;">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&#215;</span></button>
                                        <strong>Sistem Info:</strong> {{ session('notif') }}
                                    </div>
                                @endif

                                <div class="widget-body clearfix">
    <div class="table-responsive">
        <table class="table" id="sampleTable">
            <thead>
                <tr>
                    <th>ID Produk</th>
                    <th>Nama Bentuk</th>
                    <th>Faktor Kesulitan</th>
                    <th>Harga Jual</th>
                    <th>Status</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($produk as $p)
                <tr>
                    <td>#PRD-{{ $p->id_produk }}</td>
                    <td class="fw-600">{{ $p->nama_bentuk }}</td>
                    <td>{{ $p->faktor_kesulitan }}</td>
                    <td>Rp {{ number_format($p->harga_jual, 0, ',', '.') }}</td>
                    <td>
                        <span class="badge {{ $p->status == 'acc' ? 'badge-success' : 'badge-warning' }}">
                            {{ strtoupper($p->status) }}
                        </span>
                    </td>
                    <td class="text-center">
                        <div class="dropdown">
                            <button class="btn-ellipsis ripple" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons" style="font-size: 20px; vertical-align: middle;">more_vert</i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="{{ route('estimator.pb.create', $p->id_produk) }}">
                                    <i class="material-icons">line_weight</i> Detail Bahan
                                </a>
                                <a class="dropdown-item" href="{{ route('estimator.produk.edit', $p->id_produk) }}">
                                    <i class="material-icons">edit</i> Edit
                                </a>
                                <a class="dropdown-item" href="{{ route('estimator.produk.quotation', $p->id_produk) }}" target="_blank">
                                    <i class="material-icons">print</i> Cetak Quotation
                                </a>
                                
                                <div class="dropdown-divider" style="border-top: 1px solid #edf2f7;"></div>
                                
                                <form action="{{ route('estimator.produk.destroy', $p->id_produk) }}" method="POST" id="delete-form-{{ $p->id_produk }}" style="display:none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <a class="dropdown-item text-danger" href="javascript:void(0);" onclick="if(confirm('Apakah Anda yakin ingin menghapus produk ini beserta seluruh komponen bahannya?')) { document.getElementById('delete-form-{{ $p->id_produk }}').submit(); }">
                                    <i class="material-icons text-danger">delete</i> Hapus
                                </a>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
</div>
</div>
</div>
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.15/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#sampleTable').DataTable({
                "autoWidth": false,
                "order": [[0, "desc"]],
                "language": {
                    "search": "Cari:",
                    "lengthMenu": "Tampilkan _MENU_ data",
                    "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                    "paginate": {
                        "next": "Berikutnya",
                        "previous": "Sebelumnya"
                    }
                }
            });
        });
    </script>
@endpush