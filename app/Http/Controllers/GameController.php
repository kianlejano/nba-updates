<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class GameController extends Controller
{
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
}
