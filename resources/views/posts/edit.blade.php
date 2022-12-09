@extends('layout')

@section('title', 'Update post' . $post->title)

@section('content')
<h1>Update post {{ $post->title }}</h1>

<form method="POST" action="{{ route('posts.update', [$post]) }}">
    @csrf
    @method('PUT')
    {{-- <input type="hidden" name="_method" value="PUT"> --}}
    <label for="title">Title</label>
    <input class="@error('title') error-border @enderror" type="text" name="title" value="{{ old('title', $post->title) }}">
    @error('title')
        <div class="error">{{ $message }}</div>
    @enderror

    <label for="description">Description</label>
    <textarea class="@error('description') error-border @enderror" name="description">{{ old('description', $post->description) }}</textarea>
    @error('description')
        <div class="error">{{ $message }}</div>
    @enderror

    <button type="submit">Update</button>
</form>
@endsection