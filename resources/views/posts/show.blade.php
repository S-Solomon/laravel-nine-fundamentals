@extends('layout')

@section('title', $post->title)

@section('content')
    <div class="post-item">
        <div class="post-content">
            <h1>{{ $post->title }}</h1>
            <p>{{ $post->description }}</p>
        </div>
    </div>
@endsection