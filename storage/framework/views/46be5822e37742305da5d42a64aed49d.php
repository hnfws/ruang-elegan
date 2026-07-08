

<?php $__env->startSection('title', 'Edit Quotation'); ?>

<?php $__env->startSection('content'); ?>
<div class="row page-title-clearfix">
    <div class="page-title-caption">
        <h5 class="entry-title mt-0">Edit Master Quotation (#QT-<?php echo e($quot->id_quotation); ?>)</h5>
    </div>
</div>

<div class="widget-list">
    <div class="row">
        <div class="col-md-12 widget-holder">
            <div class="widget-bg">
                <div class="widget-body clearfix">
                    <form action="<?php echo e(route('admin.quotation.update', $quot->id_quotation)); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Pilih Customer</label>
                            <div class="col-md-9">
                                <select class="form-control" name="id_customer" required>
                                    <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($c->id_customer); ?>" <?php echo e($quot->id_customer == $c->id_customer ? 'selected' : ''); ?>>
                                            <?php echo e($c->nama); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Tanggal Pembuatan</label>
                            <div class="col-md-9">
                                <input class="form-control" type="date" name="tgl_dibuat" value="<?php echo e($quot->tgl_dibuat); ?>" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Diskon</label>
                            <div class="col-md-9">
                                <input class="form-control" type="number" name="diskon" value="<?php echo e(old('diskon', $quot->diskon ?? 0)); ?>" min="0" step="0.01" placeholder="Masukkan nominal potongan nego (contoh: 1000000)">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Total Harga</label>
                            <div class="col-md-9">
                                <input class="form-control" type="number" name="total_harga" value="<?php echo e($quot->total_harga); ?>" required>
                            </div>
                        </div>

                        

                        <div class="form-actions btn-list style-actions" style="margin-top: 30px;">
                            <button class="btn btn-primary btn-rounded ripple" type="submit">Simpan Perubahan</button>
                            <a href="<?php echo e(route('admin.quotation.index')); ?>" class="btn btn-default btn-rounded ripple">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/pemweb 2/resources/views/admin/quotation/edit.blade.php ENDPATH**/ ?>