<div>
    <form action=" {{ route('ideas.comments.store', $idea->id) }} " method="POST">
        @csrf
        <div class="mb-3">
            <textarea name="content" class="fs-6 form-control" rows="1"></textarea>
        </div>
        <div>
            <button class="btn btn-primary btn-sm"> Post Comment </button>
        </div>
    </form>
    <hr>
    @forelse ($idea->comments as $comment)
        <div class="d-flex align-items-start">
            <img style="width:35px" class="me-2 avatar-sm rounded-circle" src="{{ $comment->user->getImageURL() }}"
                alt="{{ $comment->user->name }}">
            <div class="w-100">
                <div class="d-flex justify-content-between">
                    <h6 class=""><a href=" {{ route('users.show', $comment->user->id) }} ">{{ $comment->user->name }}</a></h6>
                    <small class="fs-6 fw-light text-muted"> {{ $comment->created_at->DiffForHumans() }} </small>
                </div>
                <p class="fs-6 mt-3 fw-light">
                    {{ $comment->content }}
                </p>
            </div>
        </div>
    @empty
        <p class="text-center my-3">No Comments Found</p>
    @endforelse
</div>
