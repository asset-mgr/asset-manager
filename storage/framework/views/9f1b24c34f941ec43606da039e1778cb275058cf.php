

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">List Barang</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                                <th>
                                    Nama Barang
                                </th>
                                <th>
                                    Deskripsi
                                </th>
                                <th>
                                    Jumlah
                                </th>
                                <th>
                                    Harga
                                </th>
                                <th class="text-right">
                                    Harga Total
                                </th>
                                <th class="text-right">
                                    Status
                                </th>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <a <?php if($post->trashed()): ?>
                                                href="admin.itemOut/<?php echo e($post->slug); ?>"
                                            <?php else: ?> 
                                                href="admin.item/<?php echo e($post->slug); ?>"
                                            <?php endif; ?>
                                            ><?php echo e($post->nama_barang); ?></a>
                                        </td>
                                        <td>
                                            <?php echo e($post->deskripsi); ?>

                                        </td>
                                        <td>
                                            <?php echo e($post->jumlah); ?>

                                        </td>
                                        <td>
                                            <?php echo e($post->formatRupiah('harga')); ?>

                                        </td>
                                        <td class="text-right">
                                            <?php echo e($post->formatRupiah('harga_total')); ?>

                                        </td>
                                        <?php if($post->trashed()): ?>
                                            <td class="text-right">
                                                <div class="badge rounded-pill pt-1 text-bg-danger">Drop</div>
                                            </td>
                                        <?php else: ?>
                                        <td class="text-right">
                                            <div class="badge rounded-pill pt-1 text-bg-success">Active</div>
                                        </td>
                                        <?php endif; ?>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-end">
        <?php echo e($posts->links()); ?>

      </div>
    <?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Jundi\laravel project\AssetManager\resources\views/admin/item.blade.php ENDPATH**/ ?>