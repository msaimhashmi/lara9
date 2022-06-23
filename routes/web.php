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


// 	TWO NEW HELPER FUNCTIONS (Mentioned in routes and also committed seperately)

Route::get('/', function () {

	// Before laravel 9
	// return Str::of('Hello World')->upper();
	// return Str::slug('Hello World');
	
	// In laravel 9 (NEW HELPER FUNCTION - str to operate on string in a more object oriented or even a pure way)
	// return str('Hello World')->upper();
	// return str('Hello World')->slug();

    return view('welcome');
})->name('home');

Route::get('/endpoint', function(){

	// Before laravel 9
	// return redirect()->route('home');

	// In laravel 9 (NEW HELPER FUNCTION)
	return to_route('home');

});




// Before laravel 9
// Route::get('/posts', [PostsController::class, 'index']);
// Route::get('/posts/{post}', [PostsController::class, 'show']);
// Route::post('/posts', [PostsController::class, 'store']);

// In laravel 9 (CONTROLLER ROUTE GROUP)
Route::controller(PostsController::class)->group(function(){
	Route::get('/posts', 'index');
	Route::get('/posts/{post}', 'show');
	Route::post('/posts', 'store');
});