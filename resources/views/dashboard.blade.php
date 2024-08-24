<!DOCTYPE html>
<html lang="EN">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Twitter Clone</title>

    <link href="https://bootswatch.com/5/sketchy/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    @include('layout.nav')
    <div class="container py-4">
        <div class="row">
            <div class="col-3">
                <div class="card overflow-hidden">
                    @include('layout.sidebar')
                    <div class="card-footer text-center py-2">
                        <a class="btn btn-link btn-sm" href="#">View Profile </a>
                    </div>
                </div>
            </div>
            <div class="col-6">
                @include('shared.success-message')
                @include('shared.submit-idea')
                <hr>
                @foreach ($ideas as $idea)
                    <div class="mt-3">
                        @include('shared.idea-card')
                    </div>
                @endforeach
            </div>
            <div class="col-3">
                <div class="card">
                    <div class="card-header pb-0 border-0">
                        <h5 class="">Search</h5>
                    </div>
                    <div class="card-body">
                        <input placeholder="...
                        " class="form-control w-100" type="text"
                            id="search">
                        <button class="btn btn-dark mt-2"> Search</button>
                    </div>
                </div>
                @auth
                <div class="card mt-3">
                    <div class="card-header pb-0 border-0">
                        <h5 class="">Who to follow</h5>
                    </div>
                    <div class="card-body">
                        @foreach ($users as $user)
                            @include('shared.suggest-follow')
                        @endforeach
                        <div class="d-grid mt-3">
                            <a class="btn btn-sm btn-primary-soft" href="#!">Show More</a>
                        </div>
                    </div>
                </div>
                @endauth
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>
