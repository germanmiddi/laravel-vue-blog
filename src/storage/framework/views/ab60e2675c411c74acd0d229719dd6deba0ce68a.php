<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <h1>Hola</h1>
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-body">
                    <?php if($post->image): ?>
                        <img src="<?php echo e($post->get_image); ?>" class="card-img-top">
                    <?php elseif($post->iframe): ?>
                    <div class="embed-responsive embed-responsive-16by9">
                        <?php echo $post->iframe; ?>

                    </div>
                    
                    <?php endif; ?>

                    <h5 class="card-title"><?php echo e($post->title); ?></h5>
                    <p class="card-text"> 
                        <?php echo e($post->body); ?>

                    </p>
                    <p class="text-muted mb-0">
                        <em> &ndash; <?php echo e($post->user->name); ?></em>
                        <?php echo e($post->created_at->format('d M Y')); ?>

                    </p>
                </div>
            </div>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /usr/share/nginx/html/resources/views/post.blade.php ENDPATH**/ ?>