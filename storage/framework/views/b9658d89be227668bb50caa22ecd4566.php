

<?php $__env->startSection('title', 'Kelola Komponen Produk #' . $produk->id_produk); ?>


<?php $__env->startPush('styles'); ?>
<style>
    /* 1. Paksa form-group menggunakan posisi relatif standar */
    .form-material .form-group {
        position: relative !important;
        margin-bottom: 30px !important;
    }

    /* 2. Saat input/select aktif atau terisi, paksa LABEL naik ke atas */
    .form-material .form-control:focus ~ label,
    .form-material .form-control:valid ~ label,
    .form-material select.form-control ~ label {
        top: -8px !important; /* Jarak pas dari garis horizontal */
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
        <h5 class="mr-0 mr-r-5">Edit Komponen Bahan Baku</h5>
        <p class="mr-0 text-muted d-none d-md-inline-block">Produk Utama: <strong><?php echo e($produk->nama_bentuk); ?></strong></p>
    </div>
</div>

<div class="widget-list">
    <div class="row">
        <div class="col-md-12 widget-holder">
            <div class="widget-bg">
                <div class="widget-body clearfix">
                    <h5 class="box-title mr-b-30">Ubah Parameter Komponen</h5>
                    
                    <form class="form-material" action="<?php echo e(route('estimator.pb.update', [$produk->id_produk, $pb_data->urutan])); ?>" method="POST" id="formBahan">
                        <?php echo csrf_field(); ?>
                        
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    
                                    <select name="id_bahanbaku" id="id_bahanbaku" class="form-control" required>
                                        <option value="" disabled selected hidden></option>
                                        <?php $__currentLoopData = $bahan_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bahan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($bahan->id_bahanbaku); ?>" 
                                                    <?php echo e($pb_data->id_bahanbaku == $bahan->id_bahanbaku ? 'selected' : ''); ?>>
                                                <?php echo e($bahan->nama_bahan); ?> 
                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <label for="id_bahanbaku">Pilih Bahan Baku</label>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input type="number" name="qty" id="qty" class="form-control" value="<?php echo e($pb_data->qty); ?>" min="1" required>
                                    <label for="qty">Kuantitas (Qty)</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-actions btn-list mr-t-10">
                            <button type="submit" class="btn btn-primary btn-rounded ripple">Simpan Perubahan</button>
                            <a href="<?php echo e(route('estimator.pb.create', $produk->id_produk)); ?>" class="btn btn-default btn-rounded ripple">Kembali</a>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const selectBahan = document.getElementById('id_bahanbaku');
    const inputQty = document.getElementById('qty');

    // Mengambil data nilai dimensi lama yang tersimpan di JSON database

    // --- 1. FUNGSI HITUNG OTOMATIS REAL-TIME ---


    // --- 2. GENERATE INPUT DIMENSI PARAMETER ---


});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('estimator.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/pemweb 2/resources/views/estimator/produk/pb-edit.blade.php ENDPATH**/ ?>