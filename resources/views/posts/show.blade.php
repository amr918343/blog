@extends('layouts.app')
@section('content')
    <div class="container w-50">
        <div class="card">
            <div class="card-header">
                <div class="post-user d-flex flex-row align-items-center">
                    {{-- <img src="{{ asset('images/post/marshallIcon.jpg') }}" class="img-thumbnail mx-2 rounded-circle"
                        style="width: 60px;" alt="user photo"> --}}
                    <div class="d-flex flex-column justify-content-start ml-2">
                        <strong>{{ $post_user->name }}</strong>
                        <small>{{ $post->created_at->diffForHumans() }}</small>
                    </div>

                </div>
            </div>
            <div class="card-body text-center">
                {{-- <img src="{{ asset('images/post/marshallIcon.jpg') }}" class="img-thumbnail" alt="post image"> --}}
                <h3 class="lead"><strong>{{ $post->title }}</strong></h3>
                <p class="lead text-center">{{ $post->body }}</p>
            </div>
            <div class="card-footer bg-white" style="padding: 5px;border-top: 0.1px solid #eeeeee8f;">
                <div class="d-flex flex-row fs-12">
                    <div class="like cursor">
                        <button id="btn-like" data-status="{{ auth()->user()->postLike->status == true }}" class="btn btn-sm"
                            onclick="$('#form_like').submit()">like</button>
                        <small class="ml-2">Likes: {{ $post->likes()->count() }}</small>

                        <form action="{{ route('post.like.toggle') }}" method="POST" id="form_like">
                            @csrf
                            <input name="user_id" value="{{ auth()->user()->id }}" type="hidden">
                            <input name="post_id" value="{{ $post->id }}" type="hidden">
                            @method('put')
                        </form>
                    </div>
                </div>
            </div>
        </div>



        @include('comments.post_comments')
    </div>
@endsection

@section('script')
    {{-- script --}}
    <script>
        var status = $('#btn-like').data("status");
        if(status) {
            $('#btn-like').addClass('btn-danger').removeClass('btn-outline-danger');
        } else {
            $('#btn-like').addClass('btn-outline-danger').removeClass('btn-danger');
        }
    </script>
@endsection
