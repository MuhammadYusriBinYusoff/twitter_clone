<!DOCTYPE html>
<html lang="EN">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Twitter Clone Bootstrap 5 Example</title>

    <link href="https://bootswatch.com/5/sketchy/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php echo $__env->make('layout.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container py-4">
        <div class="row">
            <div class="col-3">
                <div class="card overflow-hidden">
                    <div class="card-body pt-3">
                        <ul class="nav nav-link-secondary flex-column fw-bold gap-2">
                            <li class="nav-item">
                                <a class="nav-link text-dark" href="#">
                                    <span>Home</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <span>Explore</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <span>Feed</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <span>Terms</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <span>Support</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <span>Settings</span></a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-footer text-center py-2">
                        <a class="btn btn-link btn-sm" href="#">View Profile </a>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="px-3 pt-4 pb-2">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <img style="width:150px" class="me-3 avatar-sm rounded-circle"
                                    src="<?php echo e($user->getImageUrl()); ?>" alt="Mario Avatar">
                                <?php echo $__env->make('shared.user-edit-card', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        </div>
                        <hr>
                        <?php $__currentLoopData = $ideas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $idea): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="mt-3">
                                <?php echo $__env->make('shared.idea-card', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="col-3">
                        <div class="card">
                            <div class="card-header pb-0 border-0">
                                <h5 class="">Who to follow</h5>
                            </div>
                            <div class="card-body">
                                <div class="hstack gap-2 mb-3">
                                    <div class="avatar">
                                        <a href="#!"><img class="avatar-img rounded-circle"
                                                src="https://api.dicebear.com/6.x/fun-emoji/svg?seed=Mario"
                                                alt=""></a>
                                    </div>
                                    <div class="overflow-hidden">
                                        <a class="h6 mb-0" href="#!">Mario Brother</a>
                                        <p class="mb-0 small text-truncate">@Mario</p>
                                    </div>
                                    <a class="btn btn-primary-soft rounded-circle icon-md ms-auto" href="#"><i
                                            class="fa-solid fa-plus"> </i></a>
                                </div>
                                <div class="hstack gap-2 mb-3">
                                    <div class="avatar">
                                        <a href="#!"><img class="avatar-img rounded-circle"
                                                src="https://api.dicebear.com/6.x/fun-emoji/svg?seed=Mario"
                                                alt=""></a>
                                    </div>
                                    <div class="overflow-hidden">
                                        <a class="h6 mb-0" href="#!">Mario Brother</a>
                                        <p class="mb-0 small text-truncate">@Mario</p>
                                    </div>
                                    <a class="btn btn-primary-soft rounded-circle icon-md ms-auto" href="#"><i
                                            class="fa-solid fa-plus"> </i></a>
                                </div>
                                <div class="d-grid mt-3">
                                    <a class="btn btn-sm btn-primary-soft" href="#!">Show More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
            </script>
</body>

</html>
<?php /**PATH C:\Laravel project\twitter_clone\resources\views/users/show.blade.php ENDPATH**/ ?>