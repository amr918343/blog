<form action="{{ route('post.comment.store', $post->id) }}" class="w-100" method="POST">
    @csrf
    <div class="row">
        <div class="col-sm-10">
            <textarea class="form-control shadow-none textarea" name="body"></textarea>
        </div>
        <div class="col-sm-2">
            <button class="btn btn-primary btn-sm shadow-none" type="submit">Add comment</button>
        </div>

    </div>
</form>
