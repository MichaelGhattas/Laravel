@foreach($favMeas as $fav)
    {{ $fav->cm; }}
@endforeach
<br>
@foreach($matchMeasTypes as $match)
    {{ $match->cm; }}
@endforeach
<br>
<p>Sum of measurements of the Favorite garment {{ $totalFavMeas }}</p>
<p>Sum of measurements of the Matched garment  {{ $totalMatMeas }}</p>

<p>Letter index = {{ $matchedLetterID; }}</p>
<p>In the <strong>{{ $regions[$regions_id] }}</strong>, the recommended <strong>{{ $garments[$garments_id]; }}</strong> size in <strong>{{ $brands[$brands_id]; }}</strong> is <strong>{{ $letterSizes[$matchedLetterID]; }}</strong> </p>
