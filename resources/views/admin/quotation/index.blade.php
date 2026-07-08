@extends('admin.layouts.app')

@section('title', 'Daftar Quotation')

@push('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
@endpush

@section('content')

<div class="widget-list">
    <div class="row">
        <div class="col-md-12 widget-holder">
            <div class="widget-bg">
                <div class="widget-heading clearfix">
                    <h5>Daftar Quotation</h5>
                    <div class="float-right">
                        <a href="{{ route('admin.quotation.create') }}" class="btn btn-primary btn-sm btn-rounded ripple fw-600">
                            <i class="material-icons list-icon" style="font-size:16px; vertical-align:middle;">add</i> Tambah Quotation
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
                                    <th>No. Quotation</th>
                                    <th>Customer</th>
                                    <th>Tanggal</th>
                                    <th>Diskon</th>
                                    <th>Total</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($quotations as $q)
                                <tr>
                                    <td>#QTO-{{ $q->id_quotation }}</td>
                                    <td class="fw-600">{{ $q->customer->nama }}</td>
                                    <td>{{ \Carbon\Carbon::parse($q->tgl_dibuat)->format('d/m/Y') }}</td>
                                    <td>{{ $q->diskon }}%</td>
                                    <td class="fw-600">Rp {{ number_format($q->total_harga, 0, ',', '.') }}</td>
                                    <td class="text-center">
                                        <div class="dropdown">
                                            <button class="btn-ellipsis ripple" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="material-icons" style="font-size: 20px; vertical-align: middle;">more_vert</i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="{{ route('admin.quotation.items.index', $q->id_quotation) }}">
                                                    <i class="material-icons">list</i> Kelola Item
                                                </a>
                                                <a class="dropdown-item" href="{{ route('admin.quotation.edit', $q->id_quotation) }}">
                                                    <i class="material-icons">edit</i> Edit Header
                                                </a>
                                                <a class="dropdown-item" href="{{ route('admin.quotation.print', $q->id_quotation) }}" target="_blank">
                                                    <i class="material-icons">print</i> Cetak PDF
                                                </a>
                                                
                                                <div class="dropdown-divider" style="border-top: 1px solid #edf2f7;"></div>
                                                
                                                <form action="{{ route('admin.quotation.destroy', $q->id_quotation) }}" method="POST" id="delete-form-{{ $q->id_quotation }}" style="display:none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                <a class="dropdown-item text-danger" href="javascript:void(0);" onclick="if(confirm('Apakah Anda yakin ingin menghapus data quotation ini?')) { document.getElementById('delete-form-{{ $q->id_quotation }}').submit(); }">
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