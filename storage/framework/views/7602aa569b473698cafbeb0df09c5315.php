

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="card shadow-sm">
        <div class="card-header bg-warning">
            <h4 class="mb-0">✏️ Edit Game</h4>
        </div>

        <div class="card-body">

            <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($err); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form action="<?php echo e(route('games.update', $game->id)); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                
                <div class="mb-3">
                    <label class="form-label fw-semibold">Judul Game</label>
                    <input type="text" name="title" class="form-control" value="<?php echo e($game->title); ?>">
                </div>

                
                <div class="mb-3">
                    <label class="form-label fw-semibold">Developer</label>
                    <input type="text" name="developer" class="form-control" value="<?php echo e($game->developer); ?>">
                </div>

                
                <div class="mb-3">
                    <label class="form-label fw-semibold">Deskripsi</label>
                    <textarea name="description" rows="4" class="form-control"><?php echo e($game->description); ?></textarea>
                </div>

                
                <div class="mb-3">
                    <label class="form-label fw-semibold">Genre</label><br>
                    <?php
                        $genreList = ['Action','Adventure','RPG','MOBA','Sports','Puzzle','Horror','Racing','Strategy','Simulation','Casual', 'Teka-Teki', 'Misterius', 'Modern', 'Kriminal', 'Anime', 'Bertempur', 'Immersive', 'Stategi'];
                    ?>
                    <?php $__currentLoopData = $genreList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $g): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <label class="me-3">
                            <input type="checkbox" name="genres[]" value="<?php echo e($g); ?>"
                                <?php echo e(in_array($g, $game->genres ?? []) ? 'checked' : ''); ?>>
                            <?php echo e($g); ?>

                        </label>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                
                <div class="mb-3">
                    <label class="form-label fw-semibold">Mode</label><br>
                    <?php
                        $modeList = ['Singleplayer','Multiplayer','Online','Offline','Co-op'];
                    ?>
                    <?php $__currentLoopData = $modeList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <label class="me-3">
                            <input type="checkbox" name="modes[]" value="<?php echo e($m); ?>"
                                <?php echo e(in_array($m, $game->modes ?? []) ? 'checked' : ''); ?>>
                            <?php echo e($m); ?>

                        </label>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                
                <div class="mb-3">
                    <label class="form-label fw-semibold">Platform</label><br>
                    <?php
                        $platformList = ['Android','iOS','Windows','Mac','PlayStation','Xbox','Nintendo'];
                    ?>
                    <?php $__currentLoopData = $platformList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <label class="me-3">
                            <input type="checkbox" name="platforms[]" value="<?php echo e($p); ?>"
                                <?php echo e(in_array($p, $game->platforms ?? []) ? 'checked' : ''); ?>>
                            <?php echo e($p); ?>

                        </label>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                
                <div class="mb-3">
                    <label class="form-label fw-semibold">Cover Sekarang</label><br>
                    <?php if($game->cover): ?>
                        <img src="<?php echo e(asset('storage/'.$game->cover)); ?>" width="120" class="rounded mb-2">
                    <?php else: ?>
                        <p class="text-muted">Tidak ada cover</p>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Ganti Cover (Opsional)</label>
                    <input type="file" name="cover" class="form-control">
                </div>

                <button class="btn btn-warning w-100">Update Game</button>

            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\GameStore\resources\views/admin/games/edit.blade.php ENDPATH**/ ?>