@foreach($favMeas as $fav)
    {{ $fav->cm; }}
@endforeach
<br>
@foreach($matchMeasTypes as $match)
    {{ $match->cm; }}
@endforeach


<p>LLetter index = {{ $recommendedSize; }}</p>
<p>In the <strong>{{ $regions[$regions_id] }}</strong>, the recommended <strong>{{ $garments[$garments_id]; }}</strong> size in <strong>{{ $brands[$brands_id]; }}</strong> is <strong>{{ $letterSizes[$recommendedSize]; }}</strong> </p>
