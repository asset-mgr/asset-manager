

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-sm-7">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> <?php echo e($post->nama_barang); ?></h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>Nama Barang</th>
                                <td><?php echo e($post->nama_barang); ?></td>
                            </tr>
                            <tr>
                                <th>Deskripsi</th>
                                <td><?php echo e($post->deskripsi); ?></td>
                            </tr>
                            <tr>
                                <th>Jumlah</th>
                                <td><?php echo e($post->jumlah); ?></td>
                            </tr>
                            <tr>
                                <th>Harga</th>
                                <td><?php echo e($post->formatRupiah('harga')); ?></td>
                            </tr>
                            <tr>
                                <th>Harga Total</th>
                                <td><?php echo e($post->formatRupiah('harga_total')); ?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="row">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin')): ?>
                        <div class="col-sm">
                            <a href="/admin.itemOut/restore<?php echo e($post->id); ?>" class="btn btn-round btn-warning ">
                                <i class="bi bi-recycle"></i>
                                Restore
                            </a>
                        </div>
                        <div class="col-sm">
                            <a href="/admin.itemOut/forcedelete<?php echo e($post->id); ?>" class="btn btn-danger btn-round">
                                <i class="bi bi-x-circle"></i>
                                Hapus
                            </a> 
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-5">
            <?php if($post->image): ?>
                <div class="card" style="width: 18rem; max-height: 400px; overflow:hidden">
                    <img src=<?php echo e(asset("storage/".$post->image)); ?> class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo e($post->nama_barang); ?></h5>
                        <p class="card-text"><?php echo e($post->deskripsi); ?></p>
                    </div>
                </div>
            <?php else: ?>
                <div class="card" style="width: 18rem;">
                    <img src=<?php echo e(asset("storage/image-2935360_1920.png")); ?> class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo e($post->nama_barang); ?></h5>
                        <p class="card-text"><?php echo e($post->deskripsi); ?></p>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Jundi\laravel project\AssetManager\resources\views/admin/showItemOut.blade.php ENDPATH**/ ?>