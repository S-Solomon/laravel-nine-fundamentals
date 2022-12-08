@extends('layout')

@section('title', 'Create new post')

@section('content')
<h1>Create a New Blog Post</h1>

<form method="POST" action="{{ route('posts.store') }}">
    <label for="title">Title</label>
    <input type="text" name="title">

    <label for="description">Description</label>
    <textarea name="description"></textarea>

    <button type="submit">Submit</button>
</form>
@endsection