

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="fw-bold">🎮 Game List</h2>
        <a href="<?php echo e(route('games.create')); ?>" class="btn btn-primary">
            + Tambah Game
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Cover</th>
                        <th>Title</th>
                        <th>Developer</th>
                        <th style="width: 160px;">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $__currentLoopData = $games; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $g): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            <?php if($g->cover): ?>
                                <img src="<?php echo e(asset('covers/' . basename($g->cover))); ?>" width="70" class="rounded">
                            <?php else: ?>
                                <span class="text-muted">No Image</span>
                            <?php endif; ?>
                        </td>
                        <td class="fw-semibold"><?php echo e($g->title); ?></td>
                        <td><?php echo e($g->developer); ?></td>
                        <td>
                            <a href="<?php echo e(route('games.edit', $g->id)); ?>" class="btn btn-warning btn-sm">
                                Edit
                            </a>
                            <form action="<?php echo e(route('games.destroy', $g->id)); ?>"
                                  method="POST" class="d-inline">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button onclick="return confirm('Yakin hapus?')" 
                                        class="btn btn-danger btn-sm">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>

            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\GameStore\resources\views/admin/games/index.blade.php ENDPATH**/ ?>