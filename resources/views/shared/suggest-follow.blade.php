@if(!Auth::user()->follows($user) && Auth::id() != $user->id)
<div class="hstack gap-2 mb-3">
    <div class="avatar">
        <a href="#!"><img class="avatar-img rounded-circle"
                src="https://api.dicebear.com/6.x/fun-emoji/svg?seed=Mario" alt=""></a>
    </div>
    <div class="overflow-hidden">
        <a class="h6 mb-0" href="#!">{{ $user->name }}</a>
        <p class="mb-0 small text-truncate">{{ $user->email }}</p>
    </div>
    <form action="{{ route('users.follow', $user->id) }}" method="post" class="ms-auto">
        @csrf
        <button type="submit" class="btn btn-primary-soft rounded-circle icon-md">
            <i class="fa-solid fa-plus"></i>
        </button>
    </form>
</div>
@endIf