<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\PostController;
use GuzzleHttp\Middleware;

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

Route::get('/test', [TestController::class, 'test'])
->name('test');

require __DIR__.'/auth.php';

// Route::middleware(['auth', 'admin'])->group(function() {
//     Route::get('post/create', [PostController::class, 'create']);
//     Route::get('post', [PostController::class, 'index'])->name('post.index');
// });

// Route::post('post', [PostController::class, 'store'])->name('post.store') ->middleware('auth');

// Route::get('post/show/{post}', [PostController::class, 'show'])->name('post.show');

// Route::get('post/{post}/edit', [PostController::class, 'edit'])->name('post.edit');

// Route::patch('post/{post}', [PostController::class, 'update'])->name('post.update');

// Route::delete('post/{post}', [PostController::class, 'destroy'])->name('post.destroy');

Route::resource('post', PostController::class);