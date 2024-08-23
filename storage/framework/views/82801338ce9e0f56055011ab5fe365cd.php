<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:50px" class="me-2 avatar-sm rounded-circle"
                    src="<?php echo e($idea->user->getImageUrl()); ?>" alt="Mario Avatar">
                <div>
                    <h5 class="card-title mb-0"><a href="<?php echo e(route('users.show',$idea->user->id)); ?>"> <?php echo e($idea->user->name ?? 'Unknown User'); ?>

                        </a></h5>
                </div>
            </div>
            <?php if(Auth::id() == $idea->user->id): ?>
            <div>
                <form action="<?php echo e(route('ideas.destroy', $idea->id)); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('delete'); ?>
                    <a href= "<?php echo e(route('ideas.edit', $idea->id)); ?>"> Edit</a>
                    <a href= "<?php echo e(route('ideas.show', $idea->id)); ?>"> View</a>
                    <button class="btn btn-danger btn-sm">X</button>
                </form>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="card-body">
        <?php if($editing ?? false): ?>
            <h4> Share yours ideas </h4>
            <div class="row">
                <form action="<?php echo e(route('ideas.update', $idea->id)); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('put'); ?>
                    <div class="mb-3">
                        <textarea name='content' class="form-control" id="content" rows="3"><?php echo e($idea->content); ?></textarea>
                    </div>
                    <div class="">
                        <button type="submit" class="btn btn-dark"> Share </button>
                    </div>
                </form>
            </div>
        <?php else: ?>
            <p class="fs-6 fw-light text-muted">
                <?php echo e($idea->content); ?>

            </p>
        <?php endif; ?>
        <div class="d-flex justify-content-between">
            
            <div>
                <form action="<?php echo e(route('likes.store', $idea->id)); ?>" method="post" style="display:inline;">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="btn btn-link fw-light nav-link fs-6">
                        <span class="fas fa-heart me-1"></span> <?php echo e($idea->likes); ?>

                    </button>
                </form>
            </div>        
            
            <div>
                <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                    3-5-2023 </span>
            </div>
        </div>
        <?php echo $__env->make('shared.submit-comment', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</div>
<?php /**PATH C:\Laravel project\twitter_clone\resources\views/shared/idea-card.blade.php ENDPATH**/ ?>