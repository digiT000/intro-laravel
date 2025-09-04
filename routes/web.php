<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;

// Route Page
Route::get('/',[HomeController::class,'index'])->name('home');

Route::middleware(['auth','verified'])->group(function(){
    Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');
    Route::get('/post/{postId}',[PostController::class,'show'])->name('post-detail');
});





Route::get('/login',[UserController::class,'loginShow'])->name('login');
Route::get('/register',[UserController::class,'registerShow'])->name('register');

Route::post('/register',[UserController::class,'register']);
Route::post('/logout',[UserController::class,'logout']);
Route::post('/login',[UserController::class,'login']);

// Blogpost Action
Route::controller(PostController::class)->group(function(){
    Route::post('/create-post','createPost')->name('post.createPost');
    Route::delete('/post/{postId}','deletePost')->name('post.deletePost');
});





// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

// Route::middleware(['auth'])->group(function () {
//     Route::redirect('settings', 'settings/profile');

//     Route::get('settings/profile', Profile::class)->name('settings.profile');
//     Route::get('settings/password', Password::class)->name('settings.password');
//     Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
// });

require __DIR__.'/auth.php';
