@extends('layouts.app')

@section('content')
    <div class="container">
        @include('includes.alert_success')
        @include('includes.alert_error')
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a href="{{ route('user.post.create') }}" class="btn btn-info">Create</a>
                @if ($user_posts->count() > 0)
                    @foreach ($user_posts as $post)
                        <div class="card mt-5 ">
                            <div class="card-body text-center">
                                <strong>{{ $post->title }}</strong>
                                (<small>{{ $post->created_at->diffForHumans() }}</small>)
                                <p>{{ $post->body }}</p>
                                <div class="d-flex">

                                    <button class="btn btn-danger mx-2" data-target="#modal_delete{{ $post->id }}"
                                        data-toggle="modal">Delete</button>
                                    @include('users.form_delete')

                                    <a href="{{ route('user.post.edit', $post) }}" class="btn btn-success">Edit</a>

                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="paginator d-flex justify-content-center mt-3">
                        <div class="content">
                            {{ $user_posts->links() }}
                        </div>
                    </div>
                @else
                    <div class="card mt-5 p-2">
                        <div class="card-header bg-secondary text-white text-center">
                            <h3>
                                <strong>No Posts Added yet</strong>
                            </h3>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>
@endsection
