@props(['gamesToday' => []])

@php
    $teamLogos = config('team_logos');
@endphp

@if (!empty($gamesToday) && count($gamesToday) > 0)
    <div class="my-4 text-xs text-center text-gray-600 dark:text-gray-400">
        All game times and results are in Philippine Standard Time.
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-2">
        @foreach ($gamesToday as $game)
        <a href="{{ route('games.show', ['id' => $game['id']]) }}">
            <div class="flex flex-col grid-cols-3 grid-rows-3 grid-style hover:cursor-pointer hover-enlarge">
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
                        {{ \App\Services\DateFormatter::formatTimePH($game['datetime']) }}
                    @else
                        No Time Available
                    @endif
                </div>
            </div>
        </a>
        @endforeach
    </div>
@else
    <p class="empty">No games scheduled for this date.</p>
@endif
