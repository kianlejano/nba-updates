<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\GameController;


Route::get('/', function (GameController $gameController, TeamController $teamController) {
    $games = $gameController->gamesToday();
    $eastTeams = $teamController->getConferenceTeams('East');
    $westTeams = $teamController->getConferenceTeams('West');
    $randomTeam = $teamController->getRandomTeam();

    return view('dashboard.index', compact('games', 'eastTeams', 'westTeams', 'randomTeam'));
})->name('home');

Route::get('/games', function (Request $request, GameController $gameController) {
    $date = $request->query('date');
    $games = $gameController->gamesToday($date);
    
    return view('games.index', compact('games', 'date'));
})->name('games');

Route::get('/teams', function (Request $request, TeamController $teamController) {
    $conference = $request->query('conference');
    $division = $request->query('division');

    if ($conference) {
        $teams = $teamController->getConferenceTeams($conference);
    } else {
        $eastTeams = $teamController->getConferenceTeams('East');
        $westTeams = $teamController->getConferenceTeams('West');
        $teams = array_merge($eastTeams, $westTeams);
    }

    if ($division) {
        $teams = array_filter($teams, fn($team) => $team['division'] === $division);
    }

    usort($teams, fn($a, $b) => strcmp($a['full_name'], $b['full_name']));

    return view('teams.index', compact('teams'));
})->name('teams');

Route::get('/players', function () {
    return view('players.index');
})->name('players');