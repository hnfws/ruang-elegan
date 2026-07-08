

<?php $__env->startSection('title', 'Data Bahan Baku'); ?>

<?php $__env->startPush('styles'); ?>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

        <!-- /.site-sidebar -->
        <div class="widget-list">
                    <div class="row">
                        <div class="col-md-12 widget-holder">
                            <div class="widget-bg">
                                <div class="widget-heading clearfix">
                                    <h5>Daftar Master Bahan Baku</h5>
                                    <div class="float-right">
                                        <a href="<?php echo e(route('estimator.bahanbaku.create')); ?>" class="btn btn-primary btn-sm btn-rounded ripple fw-600">
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
                                        <?php $__empty_1 = true; $__currentLoopData = $bahanBaku; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

</tr>
                        <td><strong><?php echo e($row->id_bahanbaku); ?></strong></td>
                        <td><?php echo e($row->nama_bahan); ?></td>
                        <td><span class="text-muted"><?php echo e($row->merk); ?></span></td>
                        <td><strong> <?php echo e($row->jenis); ?></strong></td>
                                                <td><strong> <?php echo e($row->satuan); ?></strong></td>
                                                <td><strong> <?php echo e($row->tebal_mm); ?></strong></td>
                                                

                        

                        <td class="text-center">
                            <div class="dropdown">
                                <button class="btn-ellipsis ripple" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons" style="font-size: 20px; vertical-align: middle;">more_vert</i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
    
    <a class="dropdown-item" href="<?php echo e(route('estimator.bahanbaku.edit', $row->id_bahanbaku)); ?>">
        <i class="material-icons">edit</i> Edit
    </a>
    
    <div class="dropdown-divider" style="border-top: 1px solid #edf2f7;"></div>
    
    <a class="dropdown-item text-danger" href="<?php echo e(route('estimator.bahanbaku.delete', $row->id_bahanbaku)); ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');">
        <i class="material-icons text-danger">delete</i> Hapus
    </a>
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
<?php echo $__env->make('estimator.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/pemweb 2/resources/views/estimator/bahanbaku/index.blade.php ENDPATH**/ ?>