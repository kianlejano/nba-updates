<x-layout>
    <div class="p-4">
        <div class="grid gap-4 grid-cols-1 md:grid-cols-8">
            <div class="dashboard-card md:col-span-5">
                <div class="app-name text-center mb-4 p-2 dark:bg-blue-800 rounded-md">Games Today</div>
                <x-games.today :games-today="$games"></x-games.today>
            </div>
            <div class="dashboard-card md:col-span-3">
                <x-teams.random :team="$randomTeam"></x-teams.random>
            </div>
            <div class="dashboard-card md:col-span-4">
                <div class="app-name text-center mb-4 p-2 dark:bg-red-800 rounded-md">West</div>
                <x-teams.conference :teams="$westTeams"></x-teams.conference>
            </div>
            <div class="dashboard-card md:col-span-4">
                <div class="app-name text-center mb-4 p-2 dark:bg-blue-800 rounded-md">East</div>
                <x-teams.conference :teams="$eastTeams"></x-teams.conference>
            </div>
        </div>
    </div>
</x-layout>
