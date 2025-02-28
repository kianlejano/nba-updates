@props(['gamesToday' => []])

<h1>Today's Games</h1>

@if (!empty($gamesToday) && count($gamesToday) > 0)
    <ul>
        @foreach ($gamesToday as $game)
            <li>
                <strong>{{ $game['home_team']['full_name'] }}</strong>
                vs.
                <strong>{{ $game['visitor_team']['full_name'] }}</strong>
                - Status: {{ $game['status'] }}
            </li>
        @endforeach
    </ul>
@else
    <p>No games today.</p>
@endif
