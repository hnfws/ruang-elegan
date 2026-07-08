

<?php $__env->startSection('title', 'Ubah Produk Master'); ?>


<?php $__env->startPush('styles'); ?>
<style>
    /* 1. Paksa form-group menggunakan posisi relatif standar */
    .form-material .form-group {
        position: relative !important;
        margin-bottom: 30px !important;
    }

    /* 2. Saat input aktif, valid, atau select/file bertipe khusus, paksa LABEL naik ke atas */
    .form-material .form-control:focus ~ label,
    .form-material .form-control:valid ~ label,
    .form-material select.form-control ~ label,
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
        <h5 class="mr-0 mr-r-5">Ubah Data Produk</h5>
        <p class="mr-0 text-muted d-none d-md-inline-block">Silakan perbarui spesifikasi model produk utama di bawah ini</p>
    </div>
</div>

<div class="widget-list">
    <div class="row">
        <div class="col-md-12 widget-holder">
            <div class="widget-bg">
                <div class="widget-body clearfix">
                    <h5 class="box-title mr-b-30">Form Edit Produk</h5>
                    
                    <form class="form-material" action="<?php echo e(route('estimator.produk.update', $data_produk->id_produk)); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input class="form-control" id="nama_bentuk" name="nama_bentuk" type="text" value="<?php echo e($data_produk->nama_bentuk); ?>" required>
                                    <label for="nama_bentuk">Nama Bentuk / Model</label>
                                </div>
                            </div>
                            
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input class="form-control" id="faktor_kesulitan" name="faktor_kesulitan" type="number" step="0.01" value="<?php echo e($data_produk->faktor_kesulitan); ?>" required>
                                    <label for="faktor_kesulitan">Faktor Kesulitan (Pengali Markup)</label>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input class="form-control" id="harga_jual" name="harga_jual" type="number" step="0.01" value="<?php echo e($data_produk->harga_jual); ?>" required>
                                    <label for="harga_jual">Harga Jual / Nilai Penawaran (Rp)</label>
                                </div>
                            </div>
                            
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <select class="form-control" id="status" name="status" required>
                                        <option value="" disabled selected hidden></option>
                                        <?php $__currentLoopData = $enum_status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $st): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($st); ?>" <?php echo e($data_produk->status == $st ? 'selected' : ''); ?>>
                                                <?php echo e(strtoupper($st)); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <label for="status">Status Produk</label>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group mr-b-20">
                                    <input class="form-control" id="gambar_produk" name="gambar_produk" type="file" accept="image/*">
                                    <label for="gambar_produk">Ubah Foto / Desain Produk</label>
                                    
                                    <?php if($data_produk->gambar_produk): ?>
                                        <div class="mr-t-15">
                                            <small class="text-muted d-block mr-b-5">Gambar saat ini:</small>
                                            <img src="<?php echo e(asset('storage/' . $data_produk->gambar_produk)); ?>" alt="Produk" style="max-height: 100px; border-radius: 4px;" class="img-thumbnail">
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-actions btn-list mr-t-10">
                            <button class="btn btn-primary btn-rounded ripple" type="submit">
                                Simpan Perubahan <i class="material-icons" style="font-size: 16px; vertical-align: middle; margin-left: 5px;">save</i>
                            </button>
                            <a href="<?php echo e(route('estimator.produk.index')); ?>" class="btn btn-default btn-rounded ripple">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('estimator.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/pemweb 2/resources/views/estimator/produk/edit.blade.php ENDPATH**/ ?>