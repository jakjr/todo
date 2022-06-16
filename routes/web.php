<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;


Route::get('t', function () {

});

Route::get('/', TodoController::class);
