@props(['game' => []])

@php
    $teamLogos = config('team_logos');
@endphp

@if (!empty($game))
    <div class="dashboard-card flex flex-col md:flex-row gap-2">  
        <div class="game-team-info">
            <a href="{{ route('players', ['team' => $game['home_team']['id']]) }}">
                <img src="{{ asset('images/team-logos/' . ($teamLogos[$game['home_team']['id']] ?? 'nba-logo.svg')) }}" alt="Team Logo" class="hover-enlarge-no-shadow w-70 h-70 p-4"">
            </a>
            <div class="px-4 mt-4 rounded-sm dark:bg-gray-700 text-2xl text-center">HOME</div>
            <div class="text-5xl">{{ $game['home_team_score'] }}</div> 
            <div class="font-bold text-3xl text-center">{{ $game['home_team']['full_name'] }}</div>
            <div class="{{  $game['home_team']['conference'] === 'East' ? 'bg-blue-800' : 'bg-red-800' }} rounded-sm px-1">{{ $game['home_team']['abbreviation'] }}</div>
        </div>

        <div class="game-team-info">
            <img src="{{ asset('images/team-logos/nba-logo.svg') }}" alt="Team Logo" class="w-20 h-20 p-4"">
            <div>{{ \App\Services\DateFormatter::formatDatePH($game['datetime']) }}</div>
            <div>{{ \App\Services\DateFormatter::formatTimePH($game['datetime']) }}</div>
            @if(isset($game['time']))
                <div class="px-4 mt-4 rounded-sm dark:bg-gray-700">TIME</div>
                <div class="font-bold text-2xl">{{ $game['time'] }}</div>
            @endif
        </div>

        <div class="game-team-info">
            <a href="{{ route('players', ['team' => $game['visitor_team']['id']]) }}">
                <img src="{{ asset('images/team-logos/' . ($teamLogos[$game['visitor_team']['id']] ?? 'nba-logo.svg')) }}" alt="Team Logo" class="hover-enlarge-no-shadow w-70 h-70 p-4"">
            </a>
            <div class="px-4 mt-4 rounded-sm dark:bg-gray-700 text-2xl text-center">AWAY</div>
            <div class="text-5xl">{{ $game['visitor_team_score'] }}</div>
            <div class="font-bold text-3xl text-center">{{ $game['visitor_team']['full_name'] }}</div>
            <div class="{{ $game['visitor_team']['conference'] === 'East' ? 'bg-blue-800' : 'bg-red-800' }} rounded-sm px-1">{{ $game['visitor_team']['abbreviation'] }}</div>
        </div>
    </div>
@endif
