@extends('layouts.main')
@section('content')
    <form action="{{ route('post.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" placeholder="title" name="title">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" id="content" placeholder="Content" name="content"></textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="text" class="form-control" id="image" placeholder="image" name="image">
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
