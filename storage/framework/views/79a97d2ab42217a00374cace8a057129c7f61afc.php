

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Barang Keluar</h4>
                </div>
                  <form class="form-row ml-3" method="GET" action="/admin.itemOut/filter">
                  <div class="col-md-6 pt-2">
                    <a href="/exportOut" class="btn btn-success btn-round">
                      <i class="bi bi-download"></i>
                      Excel
                    </a>
                  </div>
                    <div class="col-md-2">
                      <label for="start_date">Start Date</label>
                      <input type="date" id="start_date" name="start_date" class="form-control">
                    </div>
                    <div class="col-md-2">
                      <label for="end_date">End Date</label>
                      <input type="date" id="end_date" name="end_date" class="form-control">
                    </div>
                    <div class="col-md-1 pt-2">
                      <button type="submit" class="btn btn-primary btn-round">Search</button>
                    </div>
                  </form>
                <div class="card-body">
                    <div class="table-responsive">
                        <?php echo $__env->make('admin.tableOut', $posts, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Jundi\laravel project\AssetManager\resources\views/admin/itemOut.blade.php ENDPATH**/ ?>