<?php

use App\Http\Controllers\ApiPostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// create user endpoint


// create post endpoint with sactrum
Route::post('/posts', [ApiPostController::class, 'store']);
Route::get('/posts', [ApiPostController::class, 'index']);
