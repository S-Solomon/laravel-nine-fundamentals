@extends('layout')

@section('title', 'Home')

@section('content')
   @forelse($posts as $post)
       <div class="post-item">
        <div class="post-content">
            <h2>{{ $post->title}}</h2>
            <p>{{ $post->description }}</p>
        </div>
       </div>
       @empty
        <h2>There are no posts in the database yet</h2>   
   @endforelse
    
@endsection