<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\TaskController;


Route::get('t', function () {

});

Route::get('/', TodoController::class);
Route::resource('tasks', TaskController::class)->only(['store', 'destroy']);
Route::put('tasks/{task}/done', [TaskController::class, 'done'])->name('tasks.done');
