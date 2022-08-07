@extends('layouts.main')
@section('content')
    <div>
        <div>
            {{ $post->id }}. {{ $post->title }}
        </div>
        <div>
            {{ $post->content }}
        </div>
        <div>
            <a href="{{ route('post.edit', $post->id) }}" class="btn btn-primary">Edit</a>
        </div>
        <div>
            <form action="{{ route('post.destroy', $post->id) }}" method="POST">
                @csrf
                @method('delete')
                <input type="submit" value="Delete" class="btn btn-danger">
            </form>
        </div>
        <div>
            <a href="{{ route('post.index') }}" class="btn btn-primary">Back</a>
        </div>
    </div>
@endsection
