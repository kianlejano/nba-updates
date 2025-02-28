<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\GameController;


Route::get('/', function (GameController $gameController) {
    $games = $gameController->gamesToday();
    return view('dashboard.index', compact('games'));
})->name('home');

Route::get('/games', function () {
    return view('games.index');
})->name('games');

Route::get('/teams', function () {
    return view('teams.index');
})->name('teams');

Route::get('/players', function () {
    return view('players.index');
})->name('players');