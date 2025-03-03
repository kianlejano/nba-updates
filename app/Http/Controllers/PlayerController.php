<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlayerController extends Controller
{
    // public function teamOfTheDay($conference)
    // {
    //     $apiKey = config('services.nba_api.key');
    //     $baseUrl = config('services.nba_api.base_url');

    //     if(!$conference) $conference = 'East';

    //     $response = Http::withHeaders([
    //         'Authorization' => $apiKey,
    //         'Accept' => 'application/json',
    //     ])->get("$baseUrl/players", [
    //         '' => $conference,
    //     ]);

    //     return $response->successful() ? $response->json()['data'] : [];
    // }
}
