@props(['gamesToday' => []])

@php
    $teamLogos = config('team_logos');
@endphp

@if (!empty($gamesToday) && count($gamesToday) > 0)
     <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-2">
        @foreach ($gamesToday as $game)
        <div class="flex flex-col grid-cols-3 grid-rows-3 p-4 border-b-2 shadow-xl rounded-md border-gray-200 dark:border-gray-700 dark:hover:bg-gray-700">
            <div @class(['game-card', 'font-bold text-green-500' => ($game['home_team_score'] > $game['visitor_team_score'] && $game['time'] == 'Final')])>
                <div class="flex flex-row">
                    <img src="{{ asset('images/team-logos/' . ($teamLogos[$game['home_team']['id']] ?? 'nba-logo.svg')) }}" alt="Team Logo" class="score-logo">
                    <div class="ml-1">{{ $game['home_team']['name'] }}</div>
                </div>
                <div>{{ $game['home_team_score'] }}</div>
            </div>
            <div @class(['game-card', 'font-bold text-green-500' => ($game['visitor_team_score'] > $game['home_team_score'] && $game['time'] == 'Final')])>
                <div class="flex flex-row">
                    <img src="{{ asset('images/team-logos/' . ($teamLogos[$game['visitor_team']['id']] ?? 'nba-logo.svg')) }}" alt="Team Logo" class="score-logo">
                    <div class="ml-1">{{ $game['visitor_team']['name'] }}</div>
                </div>
                <div>{{ $game['visitor_team_score'] }}</div>
            </div>
            <div class="flex flex-row justify-center h-full items-end font-bold">
                @if(isset($game['time']))
                    {{ $game['time'] }}
                @elseif(isset($game['datetime']))  
                    @toPhTime($game['datetime'])
                @else
                    No Time Available
                @endif
            </div>
        </div>
        @endforeach
     </div>
@else
    <p class="empty">No games today.</p>
@endif
