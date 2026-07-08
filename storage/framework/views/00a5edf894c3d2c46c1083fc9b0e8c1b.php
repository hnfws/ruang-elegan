

<?php $__env->startSection('content'); ?>
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
        <form action="<?php echo e(route('admin.quotation.store')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            
            <div class="form-group">
                <select name="id_customer" class="form-control" required>
                    <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($c->id_customer); ?>"><?php echo e($c->nama); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="form-group">
                <input type="date" name="tgl_dibuat" value="<?php echo e(date('Y-m-d')); ?>" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Header & Lanjut</button>
        </form>
    </div>
</div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/pemweb 2/resources/views/admin/quotation/create.blade.php ENDPATH**/ ?>