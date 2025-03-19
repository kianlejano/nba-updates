<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\View\View;

class TeamController extends Controller
{
    public function findById($id)
    {
        $apiKey = config('services.nba_api.key');
        $baseUrl = config('services.nba_api.base_url');

        $response = Http::withHeaders([
            'Authorization' => $apiKey,
            'Accept' => 'application/json',
        ])->get("$baseUrl/teams/$id");

        return $game = $response->successful() ? $response->json()['data'] : null;
    }

    public function getTeams(): View
    {
        $apiKey = config('services.nba_api.key');
        $baseUrl = config('services.nba_api.base_url');

        // Make API request with Authorization header
        $response = Http::withHeaders([
            'Authorization' => $apiKey,
            'Accept' => 'application/json',
        ])->get( $baseUrl . 'teams');

        // Check if request was successful
        if ($response->successful()) {
            $teams = $response->json()['data'];
        } else {
            $teams = []; // Handle errors
        }

        // Return view with teams data
        return view(view: 'dashboard.index', data: compact('teams'));
    }

    public function getConferenceTeams($conference)
    {
        $apiKey = config('services.nba_api.key');
        $baseUrl = config('services.nba_api.base_url');

        $conference = $conference ?? 'East';

        $response = Http::withHeaders([
            'Authorization' => $apiKey,
            'Accept' => 'application/json',
        ])->get("$baseUrl/teams", [
            'conference' => $conference,
        ]);

        return $response->successful() ? $response->json()['data'] : [];
    }

    public function getRandomTeam()
    {
        $apiKey = config('services.nba_api.key');
        $baseUrl = config('services.nba_api.base_url');

        // generate random number from 1-30
        $id = rand(1, 30);

        $response = Http::withHeaders([
            'Authorization' => $apiKey,
            'Accept' => 'application/json',
        ])->get("$baseUrl/teams/$id");

        return $response->successful() ? $response->json()['data'] : [];
    }

}
