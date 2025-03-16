<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\TeamController;
use Illuminate\Support\Facades\View;

class TeamServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(TeamController $teamController)
    {
        $eastTeams = $teamController->getConferenceTeams('East');
        $westTeams = $teamController->getConferenceTeams('West');

        $allTeams = array_merge($eastTeams, $westTeams);
        usort($allTeams, fn($a, $b) => strcmp($a['full_name'], $b['full_name']));

        $teams = (object) [
            'east' => $eastTeams,
            'west' => $westTeams,
            'all' => $allTeams,
        ];

        View::share('globalTeams', $teams);
    }
}
