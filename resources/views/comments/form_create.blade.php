<form action="{{ route('post.comment.store', $post->id) }}" class="w-100" method="POST">
    @csrf
    
        
            <textarea class="form-control shadow-none textarea mb-2" name="body"></textarea>
        
        
            <button class="btn btn-primary btn-sm shadow-none" type="submit">Add comment</button>
        

    
</form>
