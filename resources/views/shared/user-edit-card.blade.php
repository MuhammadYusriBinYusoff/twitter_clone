<form enctype="multipart/form-data" action="{{ route('users.update', $user->id) }}" method="post">
    @csrf
    @method('put')
    <div>
        @if ($editing ?? false)
            <input name="name" value="{{ $user->name }}" type="text" class="form-control">
        @else
            <h3 class="card-title mb-0"><a href="#"> {{ $user->name }}
                </a></h3>
            <span class="fs-6 text-muted">{{ $user->email }}</span>
        @endif
    </div>
    </div>
    <div>
        @auth
            @if (Auth::id() === $user->id)
                <a href="{{ route('users.edit', $user->id) }}"> Edit</a>
            @endif
        @endauth
    </div>
    </div>
    @if ($editing ?? false)
        <div class="mt-4">
            <label for="">Profile Picture</label>
            <input type="file" name="image" class="form-control">
        </div>
    @else
    @endIf
    <div class="px-2 mt-4">
        <h5 class="fs-5"> Bio : </h5>
        @if ($editing ?? false)
            <textarea name="bio" id="bio" rows="3" class="form-control">{{ $user->bio }}</textarea>

            <button class='btn btn-dark btn-sm mb-3'>Save</button>
        @else
            <p class="fs-6 fw-light">
                {{ $user->bio }}
            </p>
        @endif
        <div class="d-flex justify-content-start">
            <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-user me-1">
                </span> {{$user->followers()->count()}} Followers </a>
            <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-brain me-1">
                </span> {{ $user->ideas()->count() }} </a>
            <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-comment me-1">
                </span> 2 </a>
        </div>
    </form>
        @if (Auth::id() != $user->id)
            <div class="mt-3">
                @if(Auth::user()->follows($user))
                <form action="{{ route('users.unfollow', $user->id) }}" method="post">
                    @csrf
                    <button type='submit' class="btn btn-danger btn-sm"> UnFollow </button>
                </form>
                @else
                <form action="{{ route('users.follow', $user->id) }}" method="post">
                    @csrf
                    <button type='submit' class="btn btn-primary btn-sm"> Follow </button>
                </form>
                @endif
            </div>
        @endif

</div>
