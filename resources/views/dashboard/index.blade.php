<x-layout>
    <h1 class="text-center text-2xl font-bold">NBA Teams</h1>

    <div class="max-w-4xl mx-auto mt-8">
        @if(count($teams) > 0)
            <ul class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @foreach ($teams as $team)
                    <li class="p-4 border rounded bg-gray-100 dark:bg-gray-800">
                        <h2 class="text-lg font-semibold text-gray-900 dark:text-white">{{ $team['full_name'] }}</h2>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Abbreviation: {{ $team['abbreviation'] }}</p>
                        <p class="text-sm text-gray-600 dark:text-gray-400">City: {{ $team['city'] }}</p>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Conference: {{ $team['conference'] }}</p>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Division: {{ $team['division'] }}</p>
                    </li>
                @endforeach
            </ul>
        @else
            <p class="text-center text-gray-600">No teams available.</p>
        @endif
    </div>
</x-layout>
