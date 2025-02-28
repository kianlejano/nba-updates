<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class GameController extends Controller
{
    public function gamesToday()
    {
        $today = Carbon::now('Asia/Manila')->subDay()->format('Y-m-d'); // subtract 1 day because dates are in US timezone
        $apiKey = config('services.nba_api.key');
        $baseUrl = config('services.nba_api.base_url');

        $response = Http::withHeaders([
            'Authorization' => $apiKey,
            'Accept' => 'application/json',
        ])->get("$baseUrl/games", [
            'dates[]' => $today,
        ]);

        $games = $response->successful() ? $response->json()['data'] : [];

        return $games;
    }
}
