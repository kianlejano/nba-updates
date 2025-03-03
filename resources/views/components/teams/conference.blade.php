@props(['teams' => []])

<div>
    @if (!empty($teams))
        <ul>
            @foreach ($teams as $team)
                <li>{{ $team['full_name'] }}</li>
            @endforeach
        </ul>
    @else
        <p>No teams available.</p>
    @endif
</div>