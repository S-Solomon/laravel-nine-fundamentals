<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/posts/create', function () {
    return view('create');
})->name('posts.create');

Route::post('/posts', function (Request $request) {
    $request->input('title');
    
    return redirect()
        ->route('posts.create')
        ->with('success', 'Post is submitted! Title: ' .
        $request->input('title') . ' Description: ' .
        $request->input('description'));
})->name('posts.store');