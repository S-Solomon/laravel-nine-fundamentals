@extends('layout')

@section('title', $post->title)

@section('content')
    <div class="post-item">
        <div class="post-content">
            <h1>{{ $post->title }}</h1>
            <p>{{ $post->description }}</p>
            <a href="{{ route('posts.edit', ['post' => $post->id]) }}">Edit Post</a>
        </div>
    </div>
@endsection