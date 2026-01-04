

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">🎮 Tambah Game Baru</h4>
        </div>

        <div class="card-body">

            <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <strong>Error!</strong> Periksa kembali inputan kamu:
                    <ul class="mt-2 mb-0">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($err); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form action="<?php echo e(route('games.store')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>

                
                <div class="mb-3">
                    <label class="form-label fw-semibold">Judul Game</label>
                    <input type="text" name="title" class="form-control" required>
                </div>

                
                <div class="mb-3">
                    <label class="form-label fw-semibold">Developer</label>
                    <input type="text" name="developer" class="form-control" required>
                </div>

                
                <div class="mb-3">
                    <label class="form-label fw-semibold">Deskripsi</label>
                    <textarea name="description" rows="4" class="form-control"></textarea>
                </div>

                
                <div class="mb-3">
                    <label class="form-label fw-semibold">Genre</label><br>
                    <?php
                        $genreList = ['Action','Adventure','RPG','MOBA','Sports','Puzzle','Horror','Racing','Strategy','Simulation','Casual', 'Teka-Teki', 'Misterius', 'Modern', 'Kriminal', 'Anime', 'Bertempur', 'Immersive', 'Stategi'];
                    ?>

                    <?php $__currentLoopData = $genreList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $g): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <label class="me-3">
                            <input type="checkbox" name="genres[]" value="<?php echo e($g); ?>"> <?php echo e($g); ?>

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
                            <input type="checkbox" name="modes[]" value="<?php echo e($m); ?>"> <?php echo e($m); ?>

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
                            <input type="checkbox" name="platforms[]" value="<?php echo e($p); ?>"> <?php echo e($p); ?>

                        </label>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                
                <div class="mb-3">
                    <label class="form-label fw-semibold">Upload Cover</label>
                    <input type="file" name="cover" class="form-control">
                </div>

                <button class="btn btn-primary w-100">+ Tambah Game</button>

            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\GameStore\resources\views/admin/games/create.blade.php ENDPATH**/ ?>