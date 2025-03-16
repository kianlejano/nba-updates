@props([
    'players' => [], 
    'nextCursor' => null,
    'teamId' => null,
])

<div>
    @if (!empty($players) && count($players) > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 gap-2">
            @foreach ($players as $player)
                <div class="grid grid-flow-col grid-cols-6 grid-rows-2 p-2 border-b-2 shadow-xl rounded-md border-gray-200 hover-enlarge dark:border-gray-700 dark:hover:bg-gray-700 dark:hover:border-red-800">
                    <div class="col-span-1 row-span-2 flex justify-center items-center font-bold px-2 rounded-sm text-3xl dark:bg-gray-900 ">
                        {{ $player['jersey_number'] ?? '--' }}
                    </div>
                    <div class="col-span-4 font-bold px-2 text-start text-2xl">
                        {{ $player['first_name'] }} {{ $player['last_name'] }}
                    </div>
                    <div class="col-span-4 px-2 text-start text-xs dark:text-gray-400">
                       Height: {{ \App\Services\UnitFormatter::footToMeter($player['height']) ?? 'NA' }} m | Weight: {{ \App\Services\UnitFormatter::poundToKg($player['weight']) ?? 'NA' }} kg
                    </div>
                    <div class="col-span-1 row-span-2 flex justify-center items-center font-bold px-2 rounded-sm text-3xl ">
                        {{ $player['position'] }}
                    </div>
                </div>
            @endforeach
        </div>

        @if ($nextCursor)
            <div class="flex justify-center mt-4">
                <form method="GET" action="{{ route('players') }}">
                    <input type="hidden" name="team" value="{{ $teamId }}">
                    <input type="hidden" name="cursor" value="{{ $nextCursor }}">
                    <input type="hidden" name="name" value="{{ request('name') }}">
                    <button type="submit" class="text-white px-4 py-2 rounded-md dark:bg-blue-800 dark:hover:bg-blue-600">
                        Next Page
                    </button>
                </form>
            </div>
        @endif
    @else
        <p class="empty">No players available.</p>
    @endif
</div>