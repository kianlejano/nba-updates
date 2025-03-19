<x-layout>
    <div class="p-4">
        <form method="GET" action="{{ route('games.schedules', ['team' => request('team'), 'month' => request('month'), 'year' => request('year')]) }}" class="flex flex-wrap justify-center lg:justify-end gap-1 mb-4 dark:text-white">
            @php
                $selectedMonth = request('month', now()->month);
                $selectedYear = request('year', now()->year);
            @endphp

            <select name="team" class="p-2 rounded-md w-full md:w-64 bg-gray-100 dark:bg-gray-800 hover:cursor-pointer">
                @foreach ($globalTeams->all as $_team)
                    <option value="{{ $_team['id'] }}" 
                        {{ request('team') == $_team['id'] ? 'selected' : '' }}>
                        {{ $_team['full_name'] }}
                    </option>
                @endforeach
            </select>

            <select name="month" class="p-2 rounded-md w-full md:w-64 bg-gray-100 dark:bg-gray-800 hover:cursor-pointer">
                @foreach (range(1, 12) as $m)
                    <option value="{{ $m }}" {{ $selectedMonth == $m ? 'selected' : '' }}>
                        {{ date("F", mktime(0, 0, 0, $m, 1)) }}
                    </option>
                @endforeach
            </select>

            <select name="year" class="p-2 rounded-md w-full md:w-64 bg-gray-100 dark:bg-gray-800 hover:cursor-pointer">
                @for ($y = now()->year; $y >= 1946; $y--)
                    <option value="{{ $y }}" {{ $selectedYear == $y ? 'selected' : '' }}>{{ $y }}</option>
                @endfor
            </select>

            <button type="submit" class="filter-button hover-enlarge-no-shadow">
                Filter
            </button>

        </form>
        @if(!empty($games) && count($games) > 0)
            <div class="text-2xl font-semibold text-center dark:text-white mx-2 py-4">
                <p>Game Schedules for {{ date("F", mktime(0, 0, 0, $selectedMonth, 1)) ?? '-' }} {{ $selectedYear ?? '-' }}</p>
            </div>

            <div class="flex flex-col gap-4">
                @foreach($games as $game)
                    <x-games.info :game=$game></x-games.info>
                @endforeach
            </div>
        @else
            <div class="dashboard-card empty">
                No game schedule available for {{ $team['full_name'] }} in {{ date("F", mktime(0, 0, 0, $selectedMonth, 1)) }} {{ $selectedYear }}.
            </div>
        @endif
    </div>
</x-layout>