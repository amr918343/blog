@extends('layouts.app')
@section('content')
    <div class="container">
        <h3 class="lead"><strong>{{ $post->title }}</strong></h3>
        <div class="jumbotron">
            <div class="card">
                <div class="card-header">
                    <div class="post-user d-flex flex-row align-items-center">
                        <img src="{{ asset('images/post/marshallIcon.jpg') }}" class="img-thumbnail mx-2" alt="user photo">
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
                        <i class="fa fa-thumbs-o-down"></i>
                        <span class="ml-1">Like</span>
                    </div>

                    <div class="like p-2 cursor">
                        <i class="fa fa-thumbs-o-up"></i>
                        <span class="ml-1">Dislike</span>
                    </div>
                </div>
            </div>
        </div>


        @include('comments.form_comment')
    </div>
@endsection
