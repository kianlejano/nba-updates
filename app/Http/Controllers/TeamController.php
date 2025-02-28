<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\View\View;

class TeamController extends Controller
{
    public function getTeams(): View
    {
        // Get API key from config
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
}
