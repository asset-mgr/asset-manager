

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tambah Barang</h4>
                </div>
                <div class="card-body">
                    <div class="col-lg-8">
                        <form method="post" action="update<?php echo e($posts->id); ?>" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>

                            <div class="mb-3">
                                <label for="nama_barang" class="form-label">Nama Barang</label>
                                <input type="string" class="form-control" id="nama_barang" name="nama_barang"
                                    value="<?php echo e($posts->nama_barang); ?>">
                            </div>
                            <div class="mb-3">
                                <label for="slug" class="form-label">Slug</label>
                                <input type="text" class="form-control" id="slug" name="slug"
                                    value="<?php echo e($posts->slug); ?>">
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <input type="text" class="form-control" id="deskripsi" name="deskripsi"
                                    value="<?php echo e($posts->deskripsi); ?>">
                            </div>
                            <div class="mb-3">
                                <label for="harga" class="form-label">Harga</label>
                                <input type="text" class="form-control" id="harga" name="harga"
                                    value="<?php echo e($posts->harga); ?>">
                            </div>
                            <div class="mb-3">
                                <label for="jumlah" class="form-label">Jumlah</label>
                                <input type="text" class="form-control" id="jumlah" name="jumlah"
                                    value="<?php echo e($posts->jumlah); ?>">
                            </div>
                            <div class="mb-3">
                                <label for="harga_total" class="form-label">Harga Total</label>
                                <input type="text" class="form-control" id="harga_total" name="harga_total"
                                    value="<?php echo e($posts->harga_total); ?>" readonly>
                            </div>
                            <input type="hidden" id="oldImage" name="oldImage" value="<?php echo e($posts->image); ?>">
                            <?php if($posts->image): ?>
                            <div class="mb-3">
                                <label for="image" class="form-label">Foto Barang</label>
                                  <div class="card d-block" style="width: 9rem; max-height: 200px; overflow:auto">
                                    <img src=<?php echo e(asset('storage/'.$posts->image)); ?>>
                                  </div>
                                <input class="form-control" type="file" id="image" name="image">
                            </div>
                            <?php else: ?>
                            <div class="mb-3">
                                <label for="image" class="form-label">Foto Barang</label>
                                <input class="form-control" type="file" id="image" name="image">
                            </div>
                            <?php endif; ?>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script src="jquery-3.5.0.min.js"></script>
<script>
    $(document).ready(function(){
        $("#jumlah, #harga").keyup(function() {
            var harga_total = 0;
            var x = parseFloat($("#jumlah").val());
            var y = parseFloat($("#harga").val());
            var harga_total = x * y;

            $('#harga_total').val(harga_total);
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Jundi\laravel project\AssetManager\resources\views/admin/edit.blade.php ENDPATH**/ ?>