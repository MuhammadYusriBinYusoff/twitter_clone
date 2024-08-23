<div>
    <form action="<?php echo e(route('comments.store', $idea->id)); ?>" method="post">
        <?php echo csrf_field(); ?>
        <div class="mb-3">
            <textarea name='content' class="fs-6 form-control" rows="1"></textarea>
        </div>
        <div>
            <button type="submit" class="btn btn-primary btn-sm"> Post Comment </button>
        </div>
    </form>
    <hr>
    <?php $__currentLoopData = $idea->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="d-flex align-items-start">
        <img style="width:35px" class="me-2 avatar-sm rounded-circle"
            src="<?php echo e($comment->user->getImageUrl()); ?>" alt="Luigi Avatar">
        <div class="w-100">
            <div class="d-flex justify-content-between align-items-center">
                <h6 class="mb-0"><?php echo e($comment->user->name); ?></h6>
                <div class="d-flex align-items-center">
                    <small class="fs-6 fw-light text-muted me-2"><?php echo e($comment->created_at); ?></small>
                    <?php if(Auth::id() == $comment->user->id): ?>
                    <form action="<?php echo e(route('comments.destroy', $comment->id)); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('delete'); ?>
                        <button class="btn btn-danger btn-sm">X</button>
                    </form>
                    <?php endif; ?>
                </div>
            </div>
            
            <p class="fs-6 mt-3 fw-light">
                <?php echo e($comment->content); ?>

            </p>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div><?php /**PATH C:\Laravel project\twitter_clone\resources\views/shared/submit-comment.blade.php ENDPATH**/ ?>