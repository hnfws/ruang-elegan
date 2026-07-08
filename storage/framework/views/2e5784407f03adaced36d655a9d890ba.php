

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <h3>Rincian Komponen Item Quotation: #<?php echo e($quot->no_quotation); ?></h3>
        <p>Customer: <strong><?php echo e($quot->customer->nama); ?></strong> | Grand Total: <strong>Rp <?php echo e(number_format($quot->total_harga, 0, ',', '.')); ?></strong></p>
        
        <a href="<?php echo e(route('admin.quotation.items.create', $quot->id_quotation)); ?>" class="btn btn-success mb-3">Tambah Item Produk</a>
        <a href="<?php echo e(route('admin.quotation.index')); ?>" class="btn btn-default mb-3">Kembali ke List</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama Produk</th>
                    <th>Qty</th>
                    <th>Harga Snapshot</th>
                    <th>Subtotal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                <td><?php echo e($item->produk->nama_bentuk ?? $item->nama_produk_history); ?></td>                    
                <td><?php echo e($item->qty); ?></td>
                    <td>Rp <?php echo e(number_format($item->harga_satuan, 0, ',', '.')); ?></td>
                    <td>Rp <?php echo e(number_format($item->subtotal, 0, ',', '.')); ?></td>
                    <td>
                        <a href="<?php echo e(route('admin.quotation.items.edit', $item->id_detail)); ?>" class="btn btn-warning btn-sm">Ubah Qty/Harga</a>
                        <form action="<?php echo e(route('admin.quotation.items.destroy', [$quot->id_quotation, $item->id_detail])); ?>" method="POST" style="display:inline;">
                            <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus item ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/pemweb 2/resources/views/admin/quotation/items/index.blade.php ENDPATH**/ ?>