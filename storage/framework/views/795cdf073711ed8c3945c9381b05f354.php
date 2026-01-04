<?php $__env->startSection('content'); ?>
<div class="container mx-auto py-10 px-4">

    <h2 class="text-3xl font-bold text-white mb-6">Featured Games</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
        <?php $__currentLoopData = $games->take(4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $game): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="bg-gradient-to-b from-gray-900 via-gray-700 to-yellow-900 rounded-xl shadow-lg hover:shadow-2xl transition overflow-hidden border border-gray-700">
            <img src="<?php echo e(asset('covers/' . basename($game->cover))); ?>"
                 class="w-full h-48 object-cover shadow-inner">
            
            <div class="p-4">
                <h3 class="text-lg font-bold text-white truncate"><?php echo e($game->title); ?></h3>
                <p class="text-sm text-gray-200">By <?php echo e($game->developer); ?></p>
                
                <?php if(!empty($game->genres)): ?>
                <p class="text-xs text-gray-300 mt-1">Genre: <?php echo e(implode(', ', $game->genres)); ?></p>
                <?php endif; ?>
                
                <p class="mt-2 text-gray-100 text-sm h-10 overflow-hidden">
                    <?php echo e(Str::limit($game->description, 80)); ?>

                </p>

                <div class="mt-4">
                    <a href="#" class="inline-block w-full text-center bg-blue-600 text-white px-4 py-2 rounded-lg font-semibold hover:bg-blue-700 transition">
                        Install
                    </a>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <h2 class="text-2xl font-bold text-white mb-4">More Games</h2>
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
        <?php $__currentLoopData = $games->skip(4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $game): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="bg-gradient-to-b from-gray-900 via-gray-700 to-yellow-900 rounded-lg shadow hover:shadow-md transition overflow-hidden text-center p-3 border border-gray-700">
            <img src="<?php echo e(asset('covers/' . basename($game->cover))); ?>"
                 class="w-full h-32 object-cover rounded-md mb-2">
            
            <h4 class="text-sm font-bold text-white truncate"><?php echo e($game->title); ?></h4>
            
            <?php if(!empty($game->genres)): ?>
            <p class="text-xs text-gray-300 truncate"><?php echo e(implode(', ', $game->genres)); ?></p>
            <?php endif; ?>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\GameStore\resources\views/dashboard.blade.php ENDPATH**/ ?>