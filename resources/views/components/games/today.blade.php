@props(['gamesToday' => []])

@if (!empty($gamesToday) && count($gamesToday) > 0)
     <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-1 lg:grid-cols-2 gap-2">
        @foreach ($gamesToday as $game)
        <div class="flex flex-col grid-cols-3 grid-rows-3 p-4 border">
            <div @class(['flex flex-row justify-between items-center', 'font-bold text-green-500' => ($game['home_team_score'] > $game['visitor_team_score'] && $game['time'] == 'Final')])>
                <div>{{ $game['home_team']['name'] }}</div>
                <div>{{ $game['home_team_score'] }}</div>
            </div>
            <div @class(['flex flex-row justify-between items-center', 'font-bold text-green-500' => ($game['visitor_team_score'] > $game['home_team_score'] && $game['time'] == 'Final')])>
                <div>{{ $game['visitor_team']['name'] }}</div>
                <div>{{ $game['visitor_team_score'] }}</div>
            </div>
            <div class="flex flex-row justify-center">
                @if(isset($game['time']))
                    {{ $game['time'] }}
                @elseif(isset($game['datetime']))  
                    @toPhTime($game['datetime'])
                @else
                    No Time Available
                @endif
            </div>
        </div>
        @endforeach
     </div>
@else
    <p>No games today.</p>
@endif
