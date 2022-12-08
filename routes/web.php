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



Route::name('posts.')->prefix('posts')->group(function () {

    Route::get('/create', function () {
        return view('posts.create');
    })->name('create');

    Route::post('/', function (Request $request) {
        $request->validate([
            'title' => 'required',
            'description' => ['required', 'min:10'],
        ]);

        return redirect()
            ->route('posts.create')
            ->with('success', 'Post is submitted! Title: ' .
                $request->input('title') . ' Description: ' .
                $request->input('description'));
    })->name('store');
});