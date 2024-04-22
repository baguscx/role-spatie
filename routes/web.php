<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('admin', function(){
    return "<h1>Helo Admin</h1>";
})->middleware(['auth', 'verified', 'role:admin'])->name('admin');

Route::get('writer', function(){
    return "<h1>Helo writer</h1>";
})->middleware(['auth', 'verified', 'role:writer'])->name('writer');

Route::get('show', function(){
    return view('posts.index');
})->middleware(['auth', 'verified', 'role_or_permission:show post|admin'])->name('show-post');

require __DIR__.'/auth.php';
