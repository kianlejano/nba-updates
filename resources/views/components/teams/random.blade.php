@props(['team' => []])

@php
    $teamLogos = config('team_logos');
    if(!empty($team) && count($team) > 0) $logoFile = $teamLogos[$team['id']] ?? 'nba-logo.svg';
@endphp

@if (!empty($team) && count($team) > 0)
<div class="flex flex-col">
    <div class="flex justify-center items-center p-2 h-6/10 dark:bg-gray-700 rounded-md">
        <img src="{{ asset('images/team-logos/' . $logoFile) }}" alt="Team Logo" class="w-50 h-50">
    </div>

    <div class="flex flex-col gap-x-2 mt-2">
        <p class="app-name truncate">{{ $team['full_name'] }}</p>
        <p class="{{ $team['conference'] === 'East' ? 'bg-blue-800' : 'bg-red-800' }} dark:text-white w-fit rounded-sm px-1">
            {{ $team['abbreviation'] }}
        </p>
    </div>

    <div class="flex flex-col  mt-2 gap-y-2">
        <div class="flex flex-row gap-x-2">
            <div class="team-description">City:</div>
            <div class="team-info">{{ $team['city'] }}</div>
        </div>
        <div class="flex flex-row gap-x-2">
            <div class="team-description">Conference:</div>
            <div class="team-info">{{ $team['conference'] }}</div>
        </div>
        <div class="flex flex-row gap-x-2">
            <div class="team-description">Division:</div>
            <div class="team-info">{{ $team['division'] }}</div>
        </div>
    </div>
</div>
@else
    <p class="empty">No team available.</p>
@endif
