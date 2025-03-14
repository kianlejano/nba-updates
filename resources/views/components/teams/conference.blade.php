@props(['teams' => []])

<div>
    @if (!empty($teams) && count($teams) > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 gap-2">
            @foreach($teams as $team)
                <a href="{{ route('players', ['team' => $team['id']]) }}">
                    <div class="text-center border-b rounded-xs shadow-sm border-gray-200 dark:border-gray-700 dark:hover:bg-gray-700 hover:cursor-pointer hover-enlarge">
                        {{ $team['full_name'] }}
                    </div>
                </a>
            @endforeach
        </div>
    @else
        <p class="empty">No teams available.</p>
    @endif
</div>