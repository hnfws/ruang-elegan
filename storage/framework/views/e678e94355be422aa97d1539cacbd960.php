

<?php $__env->startSection('title', 'Data Customer'); ?>

<?php $__env->startPush('styles'); ?>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="widget-list">
                    <div class="row">
                        <div class="col-md-12 widget-holder">
                            <div class="widget-bg">
                                <div class="widget-heading clearfix">
                                    <h5>Daftar Master Customer</h5>
                                    <div class="float-right">
                                        <a href="<?php echo e(route('admin.customer.create')); ?>" class="btn btn-primary btn-sm btn-rounded ripple fw-600">
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
                                        <?php if($customers->isNotEmpty()): ?>
                                    <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($row->id_customer); ?></td>
                                        <td><?php echo e($row->nama); ?></td>
                                        <td><?php echo e($row->no_hp); ?></td>
                                        <td><?php echo e($row->alamat); ?></td>
                                        <td><?php echo e($row->kota); ?></td>
                        

                        <td class="text-center">
                            <div class="dropdown">
                                <button class="btn-ellipsis ripple" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons" style="font-size: 20px; vertical-align: middle;">more_vert</i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
    
    <div class="btn-group">
    <a class="btn btn-xs btn-info shadow-none" href="<?php echo e(route('admin.customer.edit', $row->id_customer)); ?>">
        <i class="material-icons">edit</i> Edit
    </a>
    
    <a class="btn btn-xs btn-danger shadow-none text-white" 
       href="<?php echo e(route('admin.customer.destroy', $row->id_customer)); ?>" 
       onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');">
        <i class="material-icons text-white">delete</i> Hapus
    </a>
</div>

                            </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                            </div>
                        </div>
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
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/pemweb 2/resources/views/admin/customer/index.blade.php ENDPATH**/ ?>