

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-6">
        <h3>Tambah Item ke Quotation #<?php echo e($quot->no_quotation); ?></h3>
        <form action="<?php echo e(route('admin.quotation.items.store', $quot->id_quotation)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label>Pilih Produk Master</label>
                <select name="id_produk" id="selProduk" class="form-control" onchange="updatePreview()" required>
                    <option value="">-- Pilih --</option>
                    <?php $__currentLoopData = $produk_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($p->id_produk); ?>" data-harga="<?php echo e($p->harga_jual); ?>"><?php echo e($p->nama_bentuk); ?> (Rp <?php echo e(number_format($p->harga_jual)); ?>)</option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="form-group">
                <label>Kuantitas (Qty)</label>
                <input type="number" name="qty" id="inputQty" value="1" min="1" class="form-control" oninput="updatePreview()" required>
            </div>
            <div class="alert alert-info">
                Subtotal Estimasi: <span id="subtotalPreview" style="font-weight:bold;">Rp 0</span>
            </div>
            <button type="submit" class="btn btn-primary">Masukkan ke Daftar</button>
        </form>
    </div>
</div>

<script>
function updatePreview() {
    const sel = document.getElementById('selProduk');
    const qty = parseFloat(document.getElementById('inputQty').value) || 0;
    const opt = sel.options[sel.selectedIndex];
    const harga = opt ? parseFloat(opt.getAttribute('data-harga') || 0) : 0;
    const sub = qty * harga;

    document.getElementById('subtotalPreview').textContent = "Rp " + new Intl.NumberFormat('id-ID').format(Math.round(sub));
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/pemweb 2/resources/views/admin/quotation/items/create.blade.php ENDPATH**/ ?>