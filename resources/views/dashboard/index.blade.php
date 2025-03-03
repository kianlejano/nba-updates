<x-layout.navbar>
    <div class="p-4">
        <div class="grid gap-4 grid-cols-1 md:grid-cols-8">
            <div class="md:col-span-5 p-4 border">
                <x-games.today :games-today="$games"></x-games.today>
            </div>
            <div class="md:col-span-3 p-4 border">09</div>
            <div class="md:col-span-4 p-4 border">01</div>
            <div class="md:col-span-4 p-4 border">09</div>
        </div>
    </div>
</x-layout.navbar>
