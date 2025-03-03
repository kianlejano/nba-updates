<x-layout>
    <div class="p-4">
        <div class="grid gap-4 grid-cols-1 md:grid-cols-8">
            <div class="md:col-span-5 p-4 border">
                <x-games.today :games-today="$games"></x-games.today>
            </div>
            <div class="md:col-span-3 p-4 border">
                <x-teams.random :team="$randomTeam"></x-teams.random>
            </div>
            <div class="md:col-span-4 p-4 border">
                <x-teams.conference :teams="$westTeams"></x-teams.conference>
            </div>
            <div class="md:col-span-4 p-4 border">
                <x-teams.conference :teams="$eastTeams"></x-teams.conference>
            </div>
        </div>
    </div>
</x-layout>
