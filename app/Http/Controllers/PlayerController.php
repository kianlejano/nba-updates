<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class PlayerController extends Controller
{

    public function findById($id)
    {
        $apiKey = config('services.nba_api.key');
        $baseUrl = config('services.nba_api.base_url');

        $response = Http::withHeaders([
            'Authorization' => $apiKey,
            'Accept' => 'application/json',
        ])->get("$baseUrl/players/$id");

        return $game = $response->successful() ? $response->json()['data'] : null;
    }

    public function teamPlayers($teamId, $cursor = null, $name = null)
    {
        $apiKey = config('services.nba_api.key');
        $baseUrl = config('services.nba_api.base_url');

        $queryParams = [
            'team_ids[]' => $teamId,
            'per_page' => 20,
        ];

        if ($cursor) {
            $queryParams['cursor'] = $cursor;
        }

        if($name){
            $queryParams['search'] = $name;
        }

        $response = Http::withHeaders([
            'Authorization' => $apiKey,
            'Accept' => 'application/json',
        ])->get("$baseUrl/players", $queryParams);

        return $response->successful() ? $response->json() : [];
    }

}
