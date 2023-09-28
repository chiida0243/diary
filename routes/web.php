<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/',[PostController::class,'index'])->name('index')->middleware('auth');
    Route::get('/post/create',[PostController::class,'create'])->name('post.create');
    
    Route::get('/posts/{post}',[PostController::class,'show']);
    Route::get('/posts/{post}/edit',[PostController::class,'edit'])->name('posts.edit');
        
        
    Route::put('/posts',[PostController::class,'update'])->name('post.update');
    Route::post('/posts', [PostController::class, 'store']);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/plans', [PostController::class, 'allindex'])->name('all.index')->middleware('auth');
    
});

require __DIR__.'/auth.php';

