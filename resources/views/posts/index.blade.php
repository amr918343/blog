@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="post-wrapper">
            <span class="text-secondary">
                <h3>Recent Posts</h3>
            </span>
            <div class="row">
                @if (isset($posts))
                    @foreach ($posts as $post)
                        <div class="col-4">
                            <div class="card text-center my-3">
                                <img src="{{ asset('images/post/marshallIcon.jpg') }}" class="card-img-top img-thumbnail"
                                    alt="marshallIcon">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $post->title }}</h5>
                                    <p class="card-text">{{ $post->body }}</p>
                                    <a href="{{ route('post.show', $post->slug) }}" class="btn btn-primary">View</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
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
