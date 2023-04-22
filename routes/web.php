<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TimelineController;
use App\Http\Controllers\CommentController;

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

Route::get('/', [TimelineController::class, 'index']);
Route::get('/timelines/create', [TimelineController::class,'create']);
Route::get('/timelines/{timeline}', [TimelineController::class ,'show']);
Route::post('/timelines', [TimelineController::class, 'store']);
Route::delete('/timelines/{timeline}', [TimelineController::class, 'delete']);
Route::get('/comments', [CommentController::class, 'index']);

require __DIR__.'/auth.php';