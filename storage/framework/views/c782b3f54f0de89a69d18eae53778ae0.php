

<?php $__env->startSection('title', 'Tambah Produk Baru'); ?>


<?php $__env->startPush('styles'); ?>
<style>
    /* 1. Paksa form-group menggunakan posisi relatif standar */
    .form-material .form-group {
        position: relative !important;
        margin-bottom: 30px !important;
    }

    /* 2. Saat input aktif, valid, atau bertipe file, paksa LABEL naik ke atas */
    .form-material .form-control:focus ~ label,
    .form-material .form-control:valid ~ label,
    .form-material input[type="file"].form-control ~ label {
        top: -8px !important; /* Jarak pas dari garis horizontal atas */
        font-size: 12px !important;
        color: #8DA432 !important; /* Warna Hijau Menu Aktif Sidebar */
        opacity: 1 !important;
        font-weight: 600 !important;
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
<div class="row page-title clearfix">
    <div class="page-title-left">
        <h5 class="mr-0 mr-r-5">Tambah Produk Utama</h5>
        <p class="mr-0 text-muted d-none d-md-inline-block">Silakan daftarkan spesifikasi model produk utama baru</p>
    </div>
</div>

<div class="widget-list">
    <div class="row">
        <div class="col-md-12 widget-holder">
            <div class="widget-bg">
                <div class="widget-body clearfix">
                    <h5 class="box-title mr-b-30">Form Registrasi Produk</h5>
                    
                    <?php if($errors->any()): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul class="mr-b-0">
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    
                    <form class="form-material" action="<?php echo e(route('estimator.produk.store')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    
                                    <input class="form-control" id="nama_bentuk" name="nama_bentuk" type="text" required>
                                    <label for="nama_bentuk">Nama Bentuk / Model</label>
                                </div>
                            </div>
                            
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input class="form-control" id="faktor_kesulitan" name="faktor_kesulitan" type="number" step="0.01" value="1.00" required>
                                    <label for="faktor_kesulitan">Faktor Kesulitan (Pengali Markup)</label>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input class="form-control" id="harga_jual" name="harga_jual" type="number" step="0.01" value="0.00" required>
                                    <label for="harga_jual">Harga Jual / Nilai Penawaran (Rp)</label>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input class="form-control" id="gambar_produk" name="gambar_produk" type="file" accept="image/*" required>
                                    <label for="gambar_produk">Foto / Desain Produk</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-actions btn-list mr-t-10">
                            <button class="btn btn-primary btn-rounded ripple" type="submit">
                                Selanjutnya (Isi Komponen) <i class="material-icons" style="font-size: 16px; vertical-align: middle; margin-left: 5px;">arrow_forward</i>
                            </button>
                            <a href="<?php echo e(route('estimator.produk.index')); ?>" class="btn btn-default btn-rounded ripple">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('estimator.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/pemweb 2/resources/views/estimator/produk/create.blade.php ENDPATH**/ ?>