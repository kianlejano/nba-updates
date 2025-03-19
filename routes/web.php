<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\PlayerController;


Route::get('/', function (GameController $gameController, TeamController $teamController) {
    $games = $gameController->gamesToday();
    $randomTeam = $teamController->getRandomTeam();

    return view('dashboard.index', compact('games', 'randomTeam'));
})->name('home');

Route::get('/games', function (Request $request, GameController $gameController) {
    $date = $request->query('date');
    $games = $gameController->gamesToday($date);
    
    return view('games.index', compact('games', 'date'));
})->name('games');

Route::get('games/schedules', function (Request $request, GameController $gameController, TeamController $teamController) {
    $month = $request->query('month');
    $year = $request->query('year');
    $teamId = $request->query('team');

    $games = $gameController->getSchedules($teamId, $month, $year);
    $team = $teamController->findById($teamId);

    return view('games.schedules', compact('games', 'team'));
})->name('games.schedules');

Route::get('games/{id}', function ($id, GameController $gameController) {
    $game = $gameController->findById($id);
    return view('games.show', compact('game'));
})->name('games.show');

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

Route::get('/players', function (Request $request, TeamController $teamController, PlayerController $playerController, GameController $gameController) {

    $teamId = $request->query('team') ?? 1;
    $cursor = $request->query('cursor') ?? null;
    $name = $request->query('name') ?? null;

    $playerResponse = $playerController->teamPlayers($teamId, $cursor, $name);
    $players = $playerResponse['data'] ?? [];
    $nextCursor = $playerResponse['meta']['next_cursor'] ?? null;

    $upcomingGame = $gameController->upcomingGame($teamId);

    return view('players.index', compact('players', 'teamId', 'upcomingGame', 'nextCursor'));
    
})->name('players');

Route::get('players/{id}', function ($id, PlayerController $playerController) {
    $player = $playerController->findById($id);
    return view('players.show', compact('player'));
})->name('players.show');