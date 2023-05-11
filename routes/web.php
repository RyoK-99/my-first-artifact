<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TimelineController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;

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

Route::get('/', [TimelineController::class, 'index'])->name('index');
Route::get('/timelines/create', [TimelineController::class,'create']);
Route::get('/timelines/{timeline}', [TimelineController::class ,'show']);
Route::post('/timelines', [TimelineController::class, 'store']);
Route::delete('/timelines/{timeline}', [TimelineController::class, 'delete']);

Route::post('/timelines/{timeline}', [CommentController::class, 'store']);

Route::get('/users/{user}', [UserController::class, 'index']);

Route::get('/reviews/create',[ReviewController::class, 'create']);
Route::get('/reviews/{review}', [ReviewController::class, 'show']);
Route::post('/reviews/like/{like}', [ReviewController::class, 'like'])->name('review.like');
Route::post('reviews/unlike/{unlike}', [ReviewController::class, 'unlike'])->name('review.unlike');
Route::post('/reviews', [ReviewController::class, 'store']);
Route::delete('/reviews/{review}', [ReviewController::class, 'delete']);

Route::get('/games', [GameController::class, 'index']);
Route::get('/games/create', [GameController::class, 'create']);
Route::get('/games/{game}', [GameController::class, 'show']);
Route::post('/games/favorite/{favorite}', [GameController::class, 'favorite'])->name('game.favorite');
Route::post('/games/destroy/{destroy}', [GameController::class, 'destroy'])->name('game.destroy');
Route::post('/games', [GameController::class, 'store']);
Route::get('/games/{game}/edit', [GameController::class, 'edit']);
Route::put('/games/{game}', [GameController::class, 'update']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';