

<?php $__env->startSection('title', 'Tambah Customer Baru'); ?>


<?php $__env->startPush('styles'); ?>
<style>
    /* 1. Paksa form-group menggunakan posisi relatif standar */
    .form-material .form-group {
        position: relative !important;
        margin-bottom: 25px !important;
    }

    /* 2. Saat input diklik (focus) atau saat input valid/terisi (valid), paksa LABEL naik ke atas */
    .form-material .form-control:focus ~ label,
    .form-material .form-control:valid ~ label {
        top: -15px !important;
        font-size: 12px !important;
        color: #8DA432 !important; /* Warna hijau tema utama */
        opacity: 1 !important;
    }

    /* 3. Atur posisi dasar label saat input masih kosong agar tepat di tengah kotak */
    .form-material .form-group label {
        position: absolute !important;
        left: 0 !important;
        top: 8px !important;
        transition: all 0.2s ease-in-out !important;
        pointer-events: none !important;
        color: #999 !important;
    }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
            <div class="widget-list">
                <div class="row">
                    <div class="col-md-12 widget-holder">
                        <div class="widget-bg">
                            <div class="widget-body clearfix">
                                <h5 class="box-title mr-b-0">Tambah Customer</h5>
                                <p class="text-muted">Silakan isi data customer di bawah ini dengan benar</p>
                                
                                <form class="form-material" method="post" action="<?php echo e(route('admin.customer.store')); ?>">
                                    <?php echo csrf_field(); ?>   
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                
                                                <input class="form-control" name="nama" id="l30" type="text" required>
                                                <label for="l30">Nama Customer</label>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <input class="form-control" name="alamat" id="l31" type="text" required>
                                                <label for="l31">Alamat</label>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <input class="form-control" name="no_hp" id="l32" type="text" required>
                                                <label for="l32">No. HP / WhatsApp</label>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <input class="form-control" name="kota" id="l33" type="text" required>
                                                <label for="l33">Kota</label>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-actions btn-list mr-t-20">
                                        <button class="btn btn-primary btn-rounded ripple" type="submit" name="submit_tambah">Simpan Customer</button>
                                        <a href="<?php echo e(route('admin.customer.index')); ?>" class="btn btn-default btn-rounded ripple">Batal</a>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/pemweb 2/resources/views/admin/customer/create.blade.php ENDPATH**/ ?>