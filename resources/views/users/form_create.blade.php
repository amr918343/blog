@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h3 class="text-center">Create post</h3>
                <form action="{{ route('user.post.store') }}" method="POST" id="form_create">
                    @csrf
                    <div class="form-group d-flex flex-wrap">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control">
                        @error('title')
                            <span class="text-danger d-block"><strong><small>{{ $message }}</small></strong></span>
                        @enderror
                    </div>
                    <div class="form-group d-flex flex-wrap">
                        <label for="body">Content</label>
                        <textarea type="text" name="body" id="body" class="form-control"></textarea>
                        @error('body')
                            <span class="text-danger d-block"><strong><small>{{ $message }}</small></strong></span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
@endsection
