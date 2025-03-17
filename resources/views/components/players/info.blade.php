@props(['player' => []])

@php
    $teamLogos = config('team_logos');
@endphp

@if (!empty($player))
    <div class="flex justify-center">
        <div class="dashboard-card flex flex-col gap-2">
            <div class="grid grid-cols-4 gap-x-1">
                <div class="col-span-1 flex flex-col justify-center items-center gap-y-4 p-2">
                    <img src="{{ asset('images/team-logos/' . ($teamLogos[$player['team']['id']] ?? 'nba-logo.svg')) }}" alt="Team Logo" class="w-20"">
                    <div class="font-bold text-4xl">{{ $player['position'] ?? '' }}</div>
                    <div class="font-bold text-4xl"># {{ $player['jersey_number'] ?? '--' }}</div>
                </div>
                <div class="col-span-3 bg-gray-200 dark:bg-gray-700 flex justify-center items-end rounded-md">
                    <img src="{{ asset('images/profile.svg') }}" alt="profile" class="w-40 h-40"">
                </div>
            </div>
            <div class="font-extrabold text-center text-4xl">{{ $player['first_name'] }} {{ $player['last_name'] }}</div>
            <div class="flex flex-row justify-between gap-0">
                <div class="player-description">Height</div>
                <div class="player-info">{{ \App\Services\UnitFormatter::footToMeter($player['height']) ?? '--' }} {{ $player['height'] ? 'm' : '' }}</div>
            </div>
            <div class="flex flex-row justify-between gap-0">
                <div class="player-description">Weight</div>
                <div class="player-info">{{ \App\Services\UnitFormatter::poundToKg($player['weight']) ?? '--' }} {{ $player['weight'] ? 'kg' : '' }}</div>
            </div>
            <div class="flex flex-row justify-between gap-0">
                <div class="player-description">College</div>
                <div class="player-info">{{ $player['college'] }}</div>
            </div>
            <div class="flex flex-row justify-between gap-0">
                <div class="player-description">Country</div>
                <div class="player-info">{{ $player['country'] }}</div>
            </div>    
            <div class="flex flex-row justify-between gap-0">
                <div class="player-description">Draft</div>
                <div class="player-info">
                    @if(!$player['draft_year'] || !$player['draft_round'] || !$player['draft_number'])
                        Undrafted
                    @else
                        {{ $player['draft_year'] }} Rd {{ $player['draft_round']}} Pick {{ $player['draft_number']}}
                    @endif
                </div>
            </div>   
        </div>
    </div>
@else
    <div class="dashboard-card empty">No player information available.</div>
@endif