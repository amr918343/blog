@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <h3 class="text-center">Edit Post</h3>
            <form action="{{ route('user.post.update', $post->id) }}" method="POST" id="form_update">
                @csrf
                @method('put')
                <div class="form-group d-flex flex-wrap">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control text-center" value="{{ $post->title }}">
                    @error('title')
                        {{ $messag('title') }}
                    @enderror
                </div>
                <div class="form-group d-flex flex-wrap">
                    <label for="body">Content</label>
                    <textarea type="text" name="body" id="body" class="form-control text-center"
                        value="{{ $post->body }}">{{ $post->body }}</textarea>
                    @error('body')
                        {{ $messag('body') }}
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Update</button>

            </form>
        </div>
    </div>
@endsection
