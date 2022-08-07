@extends('layouts.main')
@section('content')
    <form action="{{ route('post.update', $post->id) }}" method="POST">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" placeholder="title" name="title"
                value="{{ $post->title }}">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" id="content" placeholder="Content" name="content">{{ $post->content }}</textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="text" class="form-control" id="image" placeholder="image" name="image"
                value="{{ $post->image }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <div>
            <a href="{{route("post.show", $post->id)}}" class="btn btn-primary">Back</a>
        </div>
    </form>
@endsection
