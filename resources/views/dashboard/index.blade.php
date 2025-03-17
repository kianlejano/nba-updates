<x-layout>
    <div class="p-4">
        <div class="grid gap-4 grid-cols-1 md:grid-cols-8">
            <div class="dashboard-card md:col-span-5 lg:col-span-6">
                <div class="app-name text-white text-center mb-4 p-2 bg-blue-700 dark:bg-blue-800 rounded-md">Games Today</div>
                <x-games.today :games-today="$games"></x-games.today>
            </div>
            <div class="dashboard-card md:col-span-3 lg:col-span-2">
                <x-teams.random :team="$randomTeam"></x-teams.random>
            </div>
            <div class="dashboard-card md:col-span-4">
                <div class="app-name text-white text-center mb-4 p-2 bg-red-700 dark:bg-red-800 rounded-md">West</div>
                <x-teams.conference :teams="$globalTeams->west"></x-teams.conference>
            </div>
            <div class="dashboard-card md:col-span-4">
                <div class="app-name text-white text-center mb-4 p-2 bg-blue-700 dark:bg-blue-800 rounded-md">East</div>
                <x-teams.conference :teams="$globalTeams->east"></x-teams.conference>
            </div>
        </div>
    </div>
</x-layout>
