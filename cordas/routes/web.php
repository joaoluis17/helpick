<?php

use App\Http\Controllers\JobController;
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


Route::get('/blog', [JobController::class, 'index'])->middleware(['auth', 'verified'])->name('blog');
Route::post('/blog', [JobController::class, 'store'])->middleware(['auth', 'verified'])->name('blog.store');

Route::get('/produtos', function () {
    return view('products');
})->middleware(['auth', 'verified'])->name('products');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/forum', [PostController::class, 'index'])->name('forum'); // Rota para o fórum
Route::post('/posts', [PostController::class, 'store'])->name('posts.store'); // Rota para criar posts
Route::resource('posts', PostController::class);
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

Route::middleware('auth')->group(function () {
    Route::post('/comments/{post}', [CommentController::class, 'store'])->name('comments.store');
});

require __DIR__.'/auth.php';
