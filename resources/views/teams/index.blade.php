<x-layout>
    @php
        $teamFilters = config('menu.TEAM_FILTER');
    @endphp
    <div class="p-4">
        <form method="GET" action="{{ route('teams') }}" class="flex flex-wrap justify-center lg:justify-end gap-1 mb-4 dark:text-white">

            <select name="conference" class="p-2 rounded-md w-full md:w-64 dark:bg-gray-800">
                <option value="">All Conferences</option>
                @foreach ($teamFilters as $filter)
                    <option value="{{ $filter['conference'] }}" 
                        {{ request('conference') == $filter['conference'] ? 'selected' : '' }}>
                        {{ $filter['conference'] }}
                    </option>
                @endforeach
            </select>

            <select name="division" class="p-2 rounded-md w-full md:w-64 dark:bg-gray-800">
                <option value="">All Divisions</option>
                @foreach ($teamFilters as $filter)
                    @foreach ($filter['divisions'] as $division)
                        <option value="{{ $division }}" 
                            {{ request('division') == $division ? 'selected' : '' }}>
                            {{ $division }}
                        </option>
                    @endforeach
                @endforeach
            </select>

            <button type="submit" class="text-white px-4 py-2 rounded-md w-full md:w-17 dark:bg-blue-800 dark:hover:bg-blue-600">
                Filter
            </button>

        </form>
        @if (!empty($teams) && count($teams) > 0)
            <div class="grid grid-cols-4 gap-4">
                @foreach ($teams as $team)
                    <div class="dashboard-card col-span-4 md:col-span-2 lg:col-span-1">
                        <x-teams.random :team="$team"></x-teams.random>
                    </div>
                @endforeach
            </div>
        @else
            <div class="dashboard-card empty">
                No teams available on {{ request('division') }} Division of {{ request('conference') }} Conference.
            </div>
        @endif
    </div>
</x-layout>