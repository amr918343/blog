@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="post-wrapper">
            <span class="text-secondary">
                <h3>Recent Posts</h3>
            </span>
            <div class="row">
                @if (isset($posts) && $posts->count() > 0)
                    @foreach ($posts as $post)
                        <div class="col-4">
                            <div class="card text-center my-3">
                                <div class="user d-flex align-items-center mt-1">
                                    <img src="{{ asset('images/post/marshallIcon.jpg') }}" 
                                    class="img-thumbnail rounded-circle mx-2" style="width:70px; height: 70px;"
                                    alt="{{ $post->user->name }}">
                                    <div class="d-flex flex-column">
                                        <strong>
                                            {{ $post->user->name }}
                                        </strong>
                                        <small>
                                            {{ $post->created_at->diffForHumans() }}
                                        </small>
                                    </div>
                                </div>

                                <hr>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $post->title }}</h5>
                                    <p class="card-text">{{ $post->body }}</p>
                                    <a href="{{ route('post.show', $post->slug) }}" class="btn btn-primary">View</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="card mt-5 p-2 w-50 m-auto">
                        <div class="card-header bg-secondary text-white text-center">
                            <h3>
                                <strong>No Posts Added yet</strong>
                            </h3>
                        </div>
                    </div>
                @endif
            </div>
            <div class="paginator d-flex justify-content-center">
                <div class="content">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection
