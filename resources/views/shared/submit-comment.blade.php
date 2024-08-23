<div>
    <form action="{{route('comments.store', $idea->id)}}" method="post">
        @csrf
        <div class="mb-3">
            <textarea name='content' class="fs-6 form-control" rows="1"></textarea>
        </div>
        <div>
            <button type="submit" class="btn btn-primary btn-sm"> Post Comment </button>
        </div>
    </form>
    <hr>
    @foreach ($idea->comments as $comment)
    <div class="d-flex align-items-start">
        <img style="width:35px" class="me-2 avatar-sm rounded-circle"
            src="{{ $comment->user->getImageUrl() }}" alt="Luigi Avatar">
        <div class="w-100">
            <div class="d-flex justify-content-between align-items-center">
                <h6 class="mb-0">{{$comment->user->name}}</h6>
                <div class="d-flex align-items-center">
                    <small class="fs-6 fw-light text-muted me-2">{{$comment->created_at}}</small>
                    @if(Auth::id() == $comment->user->id)
                    <form action="{{route('comments.destroy', $comment->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger btn-sm">X</button>
                    </form>
                    @endIf
                </div>
            </div>
            
            <p class="fs-6 mt-3 fw-light">
                {{$comment->content}}
            </p>
        </div>
    </div>
    @endforeach
</div>