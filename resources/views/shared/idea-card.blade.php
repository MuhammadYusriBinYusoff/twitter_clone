<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:50px" class="me-2 avatar-sm rounded-circle"
                    src="{{ $idea->user->getImageUrl() }}" alt="Mario Avatar">
                <div>
                    <h5 class="card-title mb-0"><a href="{{route('users.show',$idea->user->id)}}"> {{$idea->user->name ?? 'Unknown User' }}
                        </a></h5>
                </div>
            </div>
            @if(Auth::id() == $idea->user->id)
            <div>
                <form action="{{ route('ideas.destroy', $idea->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <a href= "{{ route('ideas.edit', $idea->id) }}"> Edit</a>
                    <a href= "{{ route('ideas.show', $idea->id) }}"> View</a>
                    <button class="btn btn-danger btn-sm">X</button>
                </form>
            </div>
            @endif
        </div>
    </div>
    <div class="card-body">
        @if ($editing ?? false)
            <h4> Share yours ideas </h4>
            <div class="row">
                <form action="{{ route('ideas.update', $idea->id) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <textarea name='content' class="form-control" id="content" rows="3">{{$idea->content}}</textarea>
                    </div>
                    <div class="">
                        <button type="submit" class="btn btn-dark"> Share </button>
                    </div>
                </form>
            </div>
        @else
            <p class="fs-6 fw-light text-muted">
                {{ $idea->content }}
            </p>
        @endif
        <div class="d-flex justify-content-between">
            {{-- @if(Auth::id() == $idea->likes->id) --}}
            <div>
                <form action="{{ route('likes.store', $idea->id) }}" method="post" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn btn-link fw-light nav-link fs-6">
                        <span class="fas fa-heart me-1"></span> {{ $idea->likes}}
                    </button>
                </form>
            </div>        
            {{-- @else
            <div>
                <form action="{{ route('likes.store', $idea->id) }}" method="post" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn btn-link fw-light nav-link fs-6">
                        <span class="fas fa-heart me-1" style="color: red;"></span> {{ $idea->likes }}
                    </button>
                </form>
            </div>            
            @endIf     --}}
            <div>
                <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                    3-5-2023 </span>
            </div>
        </div>
        @include('shared.submit-comment')
    </div>
</div>
