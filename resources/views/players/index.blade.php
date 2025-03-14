<x-layout>
    <div class="p-4">
        <form method="GET" action="{{ route('players') }}" class="flex flex-wrap justify-center lg:justify-end gap-1 mb-4 dark:text-white">

            <select name="team" class="p-2 rounded-md w-full md:w-64 dark:bg-gray-800">
                @foreach ($teams as $team)
                    <option value="{{ $team['id'] }}" 
                        {{ request('team') == $team['id'] ? 'selected' : '' }}>
                        {{ $team['full_name'] }}
                    </option>
                @endforeach
            </select>

            <input type="text" id="name" name="name" value="{{ request('name') ?? '' }}" class="p-2 rounded-md w-full sm:w-64 dark:bg-gray-800" placeholder="Search Player">

            <button type="submit" class="text-white px-4 py-2 rounded-md w-full md:w-17 dark:bg-blue-800 dark:hover:bg-blue-600">
                Filter
            </button>

        </form>
        <div class="grid grid-cols-3 gap-4 items-start">
            @php
                $teamId = request('team') ?? 1;
                $selectedTeam = collect($teams)->firstWhere('id', $teamId);
            @endphp
            <div class="dashboard-card col-span-3 lg:col-span-1 h-full max-h-120">
                <x-teams.random :team="$selectedTeam"></x-teams.random>
            </div>
            <div class="col-span-3 lg:col-span-2 h-full">
                <div class="dashboard-card">
                    <div class="app-name text-center mb-4 p-2 dark:bg-blue-800 rounded-md">All Players</div>
                    <x-players.grid :players="$players" :next-cursor="$nextCursor" :team-id="$teamId"></x-players.grid>
                </div>
                
            </div>
        </div>
    </div>
</x-layout>