@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">

                <h3 class="lead"><strong>{{ $post->title }}</strong></h3>
                <div class="post-user d-flex flex-row align-items-center">
                    <img src="{{ asset('images/post/marshallIcon.jpg') }}" class="img-thumbnail mx-2 rounded-circle"
                        style="width: 60px;" alt="user photo">
                    <div class="d-flex flex-column justify-content-start ml-2">
                        <strong>{{ $post_user->name }}</strong>
                        <small>{{ $post->created_at->diffForHumans() }}</small>
                    </div>

                </div>
            </div>
            <div class="card-body text-center">
                <img src="{{ asset('images/post/marshallIcon.jpg') }}" class="img-thumbnail" alt="post image">
            </div>
            <p class="lead text-center">{{ $post->body }}</p>
            <div class="d-flex flex-row fs-12 p-2">
                <div class="like p-2 cursor">
                    <button id="btn-like" class="btn btn-sm btn-outline-danger"
                        onclick="$('#form_like').submit()">like</button>
                    <small class="ml-2">{{ $post->likes()->count() }}</small>
                    <form action="{{ route('post.like.toggle') }}" method="POST" id="form_like">
                        @csrf
                        <input name="user_id" value="{{ auth()->user()->id }}" type="hidden">
                        <input name="post_id" value="{{ $post->id }}" type="hidden">
                        @method('put')
                    </form>
                </div>
            </div>
        </div>



        @include('comments.post_comments')
    </div>
@endsection

@section('script')
    <script>
        $('#btn-like').click(function() {
            $(this).toggleClass('btn-outline-danger btn-danger'); //Adds 'a', removes 'b' and vice versa
        });
    </script>
@endsection
