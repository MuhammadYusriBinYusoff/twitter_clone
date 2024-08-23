<form enctype="multipart/form-data" action="<?php echo e(route('users.update', $user->id)); ?>" method="post">
    <?php echo csrf_field(); ?>
    <?php echo method_field('put'); ?>
    <div>
        <?php if($editing ?? false): ?>
            <input name="name" value="<?php echo e($user->name); ?>" type="text" class="form-control">
        <?php else: ?>
            <h3 class="card-title mb-0"><a href="#"> <?php echo e($user->name); ?>

                </a></h3>
            <span class="fs-6 text-muted"><?php echo e($user->email); ?></span>
        <?php endif; ?>
    </div>
    </div>
    <div>
        <?php if(auth()->guard()->check()): ?>
            <?php if(Auth::id() === $user->id): ?>
                <a href="<?php echo e(route('users.edit', $user->id)); ?>"> Edit</a>
            <?php endif; ?>
        <?php endif; ?>
    </div>
    </div>
    <?php if($editing ?? false): ?>
        <div class="mt-4">
            <label for="">Profile Picture</label>
            <input type="file" name="image" class="form-control">
        </div>
    <?php else: ?>
    <?php endif; ?>
    <div class="px-2 mt-4">
        <h5 class="fs-5"> Bio : </h5>
        <?php if($editing ?? false): ?>
            <textarea name="bio" id="bio" rows="3" class="form-control"><?php echo e($user->bio); ?></textarea>

            <button class='btn btn-dark btn-sm mb-3'>Save</button>
        <?php else: ?>
            <p class="fs-6 fw-light">
                <?php echo e($user->bio); ?>

            </p>
        <?php endif; ?>
        <div class="d-flex justify-content-start">
            <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-user me-1">
                </span> <?php echo e($user->followers()->count()); ?> Followers </a>
            <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-brain me-1">
                </span> <?php echo e($user->ideas()->count()); ?> </a>
            <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-comment me-1">
                </span> 2 </a>
        </div>
    </form>
        <?php if(Auth::id() != $user->id): ?>
            <div class="mt-3">
                <?php if(Auth::user()->follows($user)): ?>
                <form action="<?php echo e(route('users.unfollow', $user->id)); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <button type='submit' class="btn btn-danger btn-sm"> UnFollow </button>
                </form>
                <?php else: ?>
                <form action="<?php echo e(route('users.follow', $user->id)); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <button type='submit' class="btn btn-primary btn-sm"> Follow </button>
                </form>
                <?php endif; ?>
            </div>
        <?php endif; ?>

</div>
<?php /**PATH C:\Laravel project\twitter_clone\resources\views/shared/user-edit-card.blade.php ENDPATH**/ ?>