<?php

use Illuminate\Support\Facades\Route;
use App\Mail\Hello;
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
use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SessionsController;

Route::get('/', function () {
    return view('mywelcome');
});


Route::get('/blog', [\App\Http\Controllers\BlogPostController::class, 'index']);

Route::get('/blog/{blogPost}', [\App\Http\Controllers\BlogPostController::class, 'show']);

Route::get('/blog/create/post', [\App\Http\Controllers\BlogPostController::class, 'create']); //shows create post form
Route::post('/blog/create/post', [\App\Http\Controllers\BlogPostController::class, 'store']); //saves the created post to the databse
Route::get('/blog/{blogPost}/edit', [\App\Http\Controllers\BlogPostController::class, 'edit']); //shows edit post form
Route::put('/blog/{blogPost}/edit', [\App\Http\Controllers\BlogPostController::class, 'update']); //commits edited post to the database 
Route::delete('/blog/{blogPost}', [\App\Http\Controllers\BlogPostController::class, 'destroy']); //deletes post from the database

Route::post('/blog/{blogPost}/reviews', [ReviewsController::class,'store']);
//Route::post('/blog/{blogPost}/reviews', [\App\Http\Controllers\ReviewsController::class, 'store']);

Route::get('/reviews', [ReviewsController::class,'index']);
//Route::get('/reviews/{blogPost}/create', [ReviewsController::class,'create']);
Route::get('/reviews/{review}', [ReviewsController::class,'show']);


Route::get('/register', [RegistrationController::class, 'create']);
Route::post('register', [RegistrationController::class, 'store']);
Route::get('/login', [SessionsController::class, 'create'])->name('login');
Route::post('/login', [SessionsController::class, 'store']);
Route::get('/logout', [SessionsController::class, 'destroy']);
    

///mailtrap.io
///mailtrap.io
///mailtrap.io
/// send test emails
// Route::get('testemail', function () {
//     Mail::to(['bingguo0625@gmail.com'])->send(new Hello);
// });

// $user = Auth::loginUsingId(1);

// Route::get('testemail', function () use ($user)  {
//     Mail::to($user)->send(new Hello($user));
// });
