<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\PostFormRequest;

class PostController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostFormRequest $request)
    {
        $validated = $request->validated();

        $post = $request->user()->posts()->create($validated);

        return redirect()
            ->route('posts.show', [$post])
            ->with('success', 'Post is submitted! Title: ' .
                $post->title . ' Description: ' .
                $post->description);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {

        return view('posts.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {

        return view('posts.edit', [
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostFormRequest $request, Post $post)
    {
        $validated = $request->validated();

        $post->update($validated);

        return redirect()
            ->route('posts.show', [$post]) // It seems we're passing the whole post object in here, but in reality the id gets extracted 
            ->with('success', 'Post is updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()
            ->route('home')
            ->with('success', 'Post has been deleted');
    }
}