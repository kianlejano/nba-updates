<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class GameController extends Controller
{
    public function findById($id)
    {
        $apiKey = config('services.nba_api.key');
        $baseUrl = config('services.nba_api.base_url');

        $response = Http::withHeaders([
            'Authorization' => $apiKey,
            'Accept' => 'application/json',
        ])->get("$baseUrl/games/$id");

        return $game = $response->successful() ? $response->json()['data'] : null;
    }

    public function gamesToday($date = null)
    {
        if ($date) {
            $date = Carbon::parse($date, 'Asia/Manila')->subDay()->format('Y-m-d');
        } else {
            $date = Carbon::now('Asia/Manila')->subDay()->format('Y-m-d');
        }
        $apiKey = config('services.nba_api.key');
        $baseUrl = config('services.nba_api.base_url');

        $response = Http::withHeaders([
            'Authorization' => $apiKey,
            'Accept' => 'application/json',
        ])->get("$baseUrl/games", [
            'dates[]' => $date,
        ]);

        $games = $response->successful() ? $response->json()['data'] : [];

        return $games;
    }

    public function upcomingGame($teamId)
    {
        $apiKey = config('services.nba_api.key');
        $baseUrl = config('services.nba_api.base_url');

        $startDate = Carbon::today('Asia/Manila')->subDay()->format('Y-m-d');
        
        $response = Http::withHeaders([
            'Authorization' => $apiKey,
            'Accept' => 'application/json',
        ])->get("$baseUrl/games", [
            'team_ids[]' => $teamId,
            'start_date' => $startDate,
        ]);

        $games = $response->successful() ? $response->json()['data'] : [];

        if (empty($games)) {
            return null;
        }
    
        usort($games, function ($a, $b) {
            return Carbon::parse($a['date'])->unix() <=> Carbon::parse($b['date'])->unix();
        });
    
        foreach($games as $game){
            if($game['status'] != 'Final'){
                return $game;
            }
        }
    }
}
