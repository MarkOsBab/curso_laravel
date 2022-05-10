<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\PostController;
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

Route::get('category/all', [CategoryController::class, 'all']);
Route::resource('category', CategoryController::class)->except(['create', 'edit']);
Route::get('category/{category}/post', [CategoryController::class, 'posts']);
Route::get('category/slug/{slug}', [CategoryController::class, 'slug']);

Route::get('post/all', [PostController::class, 'all']);
Route::get('post/slug/{slug}', [PostController::class, 'slug']);
Route::resource('post', PostController::class)->except(['create', 'edit']);

