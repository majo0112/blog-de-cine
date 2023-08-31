<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//RUTAS PÚBLICAS

Route::get('/', function () {
    return view('allPosts', [
        'posts' => Post::where('active', true)->get()
    ]);
});

Route::get('login', function () {
    return view('login');
})->name ('login');

Route::get('register', function () {
    return view('register');
})->name ('register');

Route::get('/cargar-mas-posts', 'App\Http\Controllers\PostController@cargarMasPosts');


//RUTAS PRIVADAS

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/posts',[PostController::class,'index'])->name('posts.index');
Route::get('/posts/{id}',[PostController::class,'view'])->name('posts.view');
Route::post('/posts',[PostController::class,'store'])->name('posts.store');
Route::get('/posts/delete/{id}',[PostController::class,'destroy'])->name('posts.delete');

require __DIR__.'/auth.php';

