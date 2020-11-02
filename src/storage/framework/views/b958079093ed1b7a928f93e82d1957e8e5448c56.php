<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <h1>Hola</h1>
        <div class="col-md-8">
            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title"><?php echo e($post->title); ?></h5>
                    <p class="card-text"> 
                        <?php echo e($post->get_excerpt); ?>

                        <a href="<?php echo e(route('post', $post )); ?>">Leer más</a>
                    </p>
                    <p class="text-muted mb-0">
                        <em> &ndash; <?php echo e($post->user->name); ?></em>
                        <?php echo e($post->created_at->format('d M Y')); ?>

                    </p>
                </div>
            </div>



            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
            <?php echo e($posts->links()); ?>

            
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /usr/share/nginx/html/resources/views/posts.blade.php ENDPATH**/ ?>