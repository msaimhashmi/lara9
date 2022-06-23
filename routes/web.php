<?php

use App\Http\Controllers\PostsController;
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
    return view('welcome');
});


// Before laravel 9
// Route::get('/posts', [PostsController::class, 'index']);
// Route::get('/posts/{post}', [PostsController::class, 'show']);
// Route::post('/posts', [PostsController::class, 'store']);

// After laravel 9 (CONTROLLER ROUTE GROUP)
Route::controller(PostsController::class)->group(function(){
	Route::get('/posts', 'index');
	Route::get('/posts/{post}', 'show');
	Route::post('/posts', 'store');
});