

<?php $__env->startSection('title', 'Daftar Quotation'); ?>

<?php $__env->startPush('styles'); ?>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

<div class="widget-list">
    <div class="row">
        <div class="col-md-12 widget-holder">
            <div class="widget-bg">
                <div class="widget-heading clearfix">
                    <h5>Daftar Quotation</h5>
                    <div class="float-right">
                        <a href="<?php echo e(route('admin.quotation.create')); ?>" class="btn btn-primary btn-sm btn-rounded ripple fw-600">
                            <i class="material-icons list-icon" style="font-size:16px; vertical-align:middle;">add</i> Tambah Quotation
                        </a>
                    </div>
                </div>
                
                <?php if(session('notif')): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin: 20px 20px 0 20px;">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&#215;</span></button>
                        <strong>Sistem Info:</strong> <?php echo e(session('notif')); ?>

                    </div>
                <?php endif; ?>

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
                                <?php $__currentLoopData = $quotations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $q): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>#QTO-<?php echo e($q->id_quotation); ?></td>
                                    <td class="fw-600"><?php echo e($q->customer->nama); ?></td>
                                    <td><?php echo e(\Carbon\Carbon::parse($q->tgl_dibuat)->format('d/m/Y')); ?></td>
                                    <td><?php echo e($q->diskon); ?>%</td>
                                    <td class="fw-600">Rp <?php echo e(number_format($q->total_harga, 0, ',', '.')); ?></td>
                                    <td class="text-center">
                                        <div class="dropdown">
                                            <button class="btn-ellipsis ripple" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="material-icons" style="font-size: 20px; vertical-align: middle;">more_vert</i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="<?php echo e(route('admin.quotation.items.index', $q->id_quotation)); ?>">
                                                    <i class="material-icons">list</i> Kelola Item
                                                </a>
                                                <a class="dropdown-item" href="<?php echo e(route('admin.quotation.edit', $q->id_quotation)); ?>">
                                                    <i class="material-icons">edit</i> Edit Header
                                                </a>
                                                <a class="dropdown-item" href="<?php echo e(route('admin.quotation.print', $q->id_quotation)); ?>" target="_blank">
                                                    <i class="material-icons">print</i> Cetak PDF
                                                </a>
                                                
                                                <div class="dropdown-divider" style="border-top: 1px solid #edf2f7;"></div>
                                                
                                                <form action="<?php echo e(route('admin.quotation.destroy', $q->id_quotation)); ?>" method="POST" id="delete-form-<?php echo e($q->id_quotation); ?>" style="display:none;">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                </form>
                                                <a class="dropdown-item text-danger" href="javascript:void(0);" onclick="if(confirm('Apakah Anda yakin ingin menghapus data quotation ini?')) { document.getElementById('delete-form-<?php echo e($q->id_quotation); ?>').submit(); }">
                                                    <i class="material-icons text-danger">delete</i> Hapus
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
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
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/pemweb 2/resources/views/admin/quotation/index.blade.php ENDPATH**/ ?>