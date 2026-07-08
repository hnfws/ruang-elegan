

<?php $__env->startSection('title', 'Data Staff'); ?>

<?php $__env->startPush('styles'); ?>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

        <!-- /.site-sidebar -->
        <div class="row page-title-clearfix">
                    <div class="page-title-caption">
                    </div>
                </div>

<?php if(session('notif')): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&#215;</span></button>
                        <strong>Sistem Info:</strong> <?php echo e(session('notif')); ?>

                    </div>
                <?php endif; ?>

                <div class="widget-list">
                    <div class="row">
                        <div class="col-md-12 widget-holder">
                            <div class="widget-bg">
                                <div class="widget-heading clearfix">
                                    <h5>Daftar Master Staff</h5>
                                    <div class="float-right">
                                        <a href="<?php echo e(route('admin.staff.create')); ?>" class="btn btn-primary btn-sm btn-rounded ripple fw-600">
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
                                        <?php $__empty_1 = true; $__currentLoopData = $staff; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

</tr>
                        <td><strong><?php echo e($row->id_staff); ?></strong></td>
                        <td><?php echo e($row->nama); ?></td>
                        <td><span class="text-muted"><?php echo e($row->no_hp); ?></span></td>
                        <td><strong> <?php echo e($row->role); ?></strong></td>
                        

                        <td class="text-center">
                            <div class="dropdown">
                                <button class="btn-ellipsis ripple" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons" style="font-size: 20px; vertical-align: middle;">more_vert</i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
    
    <a class="dropdown-item" href="<?php echo e(route('admin.staff.edit', $row->id_staff)); ?>">
        <i class="material-icons">edit</i> Edit
    </a>
    
    <div class="dropdown-divider" style="border-top: 1px solid #edf2f7;"></div>
    
    <a class="dropdown-item text-danger" href="<?php echo e(route('admin.staff.delete', $row->id_staff)); ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');">
        <i class="material-icons text-danger">delete</i> Hapus
    </a>
</div>
                            </div>
                                                            
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.15/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#sampleTable').DataTable();
        });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/pemweb 2/resources/views/admin/staff/index.blade.php ENDPATH**/ ?>