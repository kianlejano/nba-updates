<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', [TeamController::class, 'getTeams']);

