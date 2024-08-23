<?php if(auth()->guard()->check()): ?>
<h4> Share yours ideas </h4>
<div class="row">
    <form action="<?php echo e(url('/idea')); ?>" method="post">
        <?php echo csrf_field(); ?>
        <div class="mb-3">
            <textarea name='content' class="form-control" id="content" rows="3"></textarea>
        </div>
        <div class="">
            <button type="submit" class="btn btn-dark"> Share </button>
        </div>
    </form>
</div>
<?php endif; ?>
<?php if(auth()->guard()->guest()): ?>
    <h4>Login to share your ideas</h4>
<?php endif; ?>
<?php /**PATH C:\Laravel project\twitter_clone\resources\views/shared/submit-idea.blade.php ENDPATH**/ ?>