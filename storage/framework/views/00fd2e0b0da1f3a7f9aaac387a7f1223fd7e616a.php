                        <table class="table">
                            <thead class=" text-primary">
                                <th>
                                  In
                                </th>
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
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <?php echo e($post->created_at->format('Y-m-d')); ?>

                                        </td>
                                        <td>
                                            <a href="admin.item/<?php echo e($post->slug); ?>"><?php echo e($post->nama_barang); ?></a>
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
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table><?php /**PATH D:\Jundi\laravel project\AssetManager\resources\views/admin/tableIn.blade.php ENDPATH**/ ?>