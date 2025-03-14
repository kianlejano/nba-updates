<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\GameController;


Route::get('/', function (GameController $gameController, TeamController $teamController) {
    $games = $gameController->gamesToday();
    $eastTeams = $teamController->getConferenceTeams('East');
    $westTeams = $teamController->getConferenceTeams('West');
    $randomTeam = $teamController->getRandomTeam();

    return view('dashboard.index', compact('games', 'eastTeams', 'westTeams', 'randomTeam'));
})->name('home');

Route::get('/games', function (GameController $gameController) {
    $date = request()->query('date');
    $games = $gameController->gamesToday($date);
    
    return view('games.index', compact('games', 'date'));
})->name('games');

Route::get('/teams', function () {
    return view('teams.index');
})->name('teams');

Route::get('/players', function () {
    return view('players.index');
})->name('players');