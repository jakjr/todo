<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ListController;


Route::get('t', function () {

});

Route::redirect('/', '/grid');
Route::get('/grid', TodoController::class)->name('grid');
Route::get('/list', ListController::class)->name('list');

Route::resource('tasks', TaskController::class)->only(['store', 'destroy']);
Route::put('tasks/{task}/done', [TaskController::class, 'done'])->name('tasks.done');
Route::put('tasks/{task}/move', [TaskController::class, 'move'])->name('tasks.move');
