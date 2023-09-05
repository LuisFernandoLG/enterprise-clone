<?php

use App\Http\Controllers\PostController;
use App\Models\Adress;
use App\Models\Commnet;
use App\Models\EPost;
use App\Models\Rol;
use App\Models\User;
use App\Models\UserRol;
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


Route::get('rent', function () {
    return view('rent');
})->name('rent');

Route::get('bussines', function () {
    return view('bussines');
})->name('bussines');


Route::get('offices', function () {
    return view('offices');
})->name('offices');

Route::get('discover', function () {

    //get 3 posts
    $posts = EPost::all()->take(4);
    $allPosts = EPost::all();

    // get post with more likes
    $postWithMoreLikes = EPost::orderBy('likes', 'desc')->first();

    return view('discover', [
        'posts' => $posts,
        'postWithMoreLikes' => $postWithMoreLikes,
        'allPosts' => $allPosts
    ]);
})->name('discover');

Route::get('/blog/{post}', [PostController::class, 'show'])->name('posts.show');
// add comment to post
Route::post('/blog/{post}/comment', [PostController::class, 'addComment'])->name('posts.comment.store');

Route::get('/test', function () {

    return 'test';
});



Route::post('/test/blog', [PostController::class, 'test_store']);
