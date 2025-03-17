<x-layout>
    <div class="p-4">
        <form method="GET" action="{{ route('games') }}" class="flex flex-wrap justify-end gap-1 mb-4 dark:text-white">
            <input 
                type="text"
                id="date"
                name="date" 
                value="{{ $date ?? '' }}"
                class="p-2 rounded-md w-full sm:w-64 bg-gray-100 dark:bg-gray-800"
                placeholder="Pick a date to view games"
                onfocus="showDatePicker(this)" 
                onblur="resetInputType(this)"
                onclick="showDatePicker(this)"
            >
            <button type="submit" class="filter-button hover-enlarge-no-shadow">
                Filter
            </button>
        </form>
        <div class="app-name mx-2 py-4">
            <p>
                {{ \App\Services\DateFormatter::weekdayMonthDay($date) }} 
                @if (\App\Services\DateFormatter::checkTodayOrTomorrow($date) != '')
                    ({{ \App\Services\DateFormatter::checkTodayOrTomorrow($date) }})
                @endif
            </p>
        </div>
        <div class="dashboard-card">
            <x-games.today :games-today="$games"></x-games.today>
        </div>

        @once
            @push('scripts')
                <script>
                    function showDatePicker(input) {
                        input.type = 'date';
                        input.showPicker();
                    }

                    function resetInputType(input) {
                        if (!input.value) {
                            input.type = 'text';
                        }
                    }
                </script>
            @endpush
        @endonce
    </div>
</x-layout>
