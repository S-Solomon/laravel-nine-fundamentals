@extends('layout')

@section('title', $post->title)

@section('content')
    <div class="post-item">
        <div class="post-content">
            <h1>{{ $post->title }}</h1>
            <p>{{ $post->description }}</p>

            @can('update', $post)
            <a href="{{ route('posts.edit', [$post]) }}">Edit Post</a>
            @endcan

            <form method="POST" action="{{ route('posts.destroy', [$post]) }}">
                @csrf
                @method('DELETE')

                @can('delete', $post)
                <button class="delete" type="submit">
                    Delete Post
                </button>
                @endcan
                
            </form>
            <small>Posted by <b>{{ $post->user->name }}</b></small>
        </div>
    </div>
@endsection