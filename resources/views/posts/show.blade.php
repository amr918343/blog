@extends('layouts.app')
@section('content')
    <div class="container w-50">
        <div class="card">
            <div class="card-header">
                <div class="post-user d-flex flex-row align-items-center">
                    <div class="d-flex flex-column justify-content-start ml-2">
                        <span id="creator_id" data-id="{{ $post->user->id }}"></span>
                        <strong>{{ $post_user->name }}</strong>
                        <small>{{ $post->created_at->diffForHumans() }}</small>
                    </div>

                </div>
            </div>
            <div class="card-body text-center">
                <h3 class="lead"><strong>{{ $post->title }}</strong></h3>
                <p class="lead text-center">{{ $post->body }}</p>
            </div>
            @auth


                <div class="card-footer bg-white" style="padding: 5px;border-top: 0.1px solid #eeeeee8f;">
                    <div class="d-flex flex-row fs-12">
                        <div class="like cursor">
                            @if ($post->isAuthUserLikedPost())
                                <button id="btn-like" class="btn btn-sm btn-danger" onclick="like()">like</button>
                            @else
                                <button id="btn-like" class="btn btn-sm btn-outline-danger" onclick="like()">like</button>
                            @endif
                            <small id="likes_count" class="ml-2">Likes: {{ $post->likes()->count() }}</small>

                            <form id="form_like">
                                @csrf
                                <input id="user_id" name="user_id" value="{{ auth()->user()->id }}" type="hidden">
                                <input id="post_id" name="post_id" value="{{ $post->id }}" type="hidden">
                            </form>
                        </div>
                    </div>
                </div>
            @endauth
        </div>



        @include('comments.post_comments')
    </div>
@endsection

@section('script')
    {{-- script --}}
    @include('includes.scripts.toggle_like_script')
    @include('includes.scripts.create_comment_script')
@endsection
