@props(['team' => []])

<div class="p-4 border rounded-md shadow-md">
    @if (!empty($team))
        <h3 class="text-xl font-bold">{{ $team['full_name'] }}</h3>
        <p><strong>Abbreviation:</strong> {{ $team['abbreviation'] }}</p>
        <p><strong>City:</strong> {{ $team['city'] }}</p>
        <p><strong>Conference:</strong> {{ $team['conference'] }}</p>
        <p><strong>Division:</strong> {{ $team['division'] }}</p>
    @else
        <p>No team available.</p>
    @endif
</div>
