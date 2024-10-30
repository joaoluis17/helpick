<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard'); // Redireciona para a página inicial se autenticado
    }
    return redirect()->route('login');
});

Route::get('/pagina-inicial', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/forum', function () {
    return view('forum');
})->middleware(['auth', 'verified'])->name('forum');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('posts', PostController::class)->middleware('auth');
Route::resource('posts.comments', CommentController::class)->middleware('auth');

require __DIR__.'/auth.php';
