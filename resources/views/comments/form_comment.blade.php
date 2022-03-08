
<div class="bg-light mt-5">
    {{-- check if user is authenticated to display comment form --}}
@if (Auth::check())
<div class="bg-white">
    <div class="bg-light p-2">
        <div class="d-flex flex-row align-items-start">
            <img class="rounded-circle" style="margin-right: 3px" src="{{ asset('images/post/marshallIcon.jpg') }}"
                width="40">
            <textarea class="form-control shadow-none textarea"></textarea>
        </div>
        <div class="mt-2 mx-2 text-right">
            <button class="btn btn-primary btn-sm shadow-none" type="button">Add comment</button>
        </div>
    </div>
</div>
@endif
    <h3 class="mx-5"><strong>Comments</strong></h3>
    @foreach ($post_comments as $comment)
        <div class="d-flex flex-column comment-section mt-2">
            <div class="bg-white p-2">
                <div class="d-flex flex-row user-info">
                    <img class="rounded-circle mx-2" src="{{ asset('images/post/marshallIcon.jpg') }}" width="40">
                    <div class="d-flex flex-column justify-content-start ml-2">
                        <span class="d-block font-weight-bold name">{{ $comment->user->name }}</span>
                        <span class="date text-black-50">{{ $comment->created_at->diffForHumans() }}</span>
                    </div>
                </div>
                <p class="comment-text text-center">{{ $comment->body }}</p>
            </div>
    @endforeach
</div>
