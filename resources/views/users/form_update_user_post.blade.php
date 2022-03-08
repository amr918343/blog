<div class="modal" tabindex="-1" role="dialog" id="modal_update{{ $post->id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update <span class="text-muted">{{ $post->title }}</span> post</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('user.post.update', $post->id) }}" method="POST" id="form_update">
                    @csrf
                    @method('put')
                    <div class="form-group d-flex flex-wrap">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{ $post->title }}">
                    </div>
                    <div class="form-group d-flex flex-wrap">
                        <label for="body">Content</label>
                        <textarea type="text" name="body" id="body" class="form-control"
                            value="{{ $post->body }}">{{ $post->body }}</textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="$('#form_update').submit()">Update</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
