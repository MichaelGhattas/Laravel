@extends('layout.admin');

@section('content');

<h3>Match your size</h3>

{{ Form::open(['action' => ['UserMeasurementsController@report',$userid],'method' => 'POST']) }}
<h4>Favorite fit</h4>
<div>
    {{ Form::label('garments_id','Garment: ') }}
    {{ Form::select('garments_id', $garments); }}
    {{ $errors->first('garments_id') }}
    
    {{ Form::label('brands_id','Brand: ') }}
    {{ Form::select('brands_id', $brands); }}
    {{ $errors->first('brands_id') }}
    
    {{ Form::label('regions_id','Region: ') }}
    {{ Form::select('regions_id', $regions); }}
    {{ $errors->first('regions_id') }}
    
    {{ Form::label('demographics_id','Demographic: ') }}
    {{ Form::select('demographics_id', $demographics); }}
    {{ $errors->first('demographics_id') }}
    
    {{ Form::label('letterSizes_id','Size letter: ') }}
    {{ Form::select('letterSizes_id', $letterSizes); }}
    {{ $errors->first('letterSizes_id') }}    
</div>

<h4>Match my size in this brand</h4>

<div>
    {{ Form::label('match_brands_id','Brand: ') }}
    {{ Form::select('match_brands_id', $brands); }}
    
    {{ Form::label('match_regions_id','Region: ') }}
    {{ Form::select('match_regions_id', $regions); }}

</div>

<div>
    {{ Form::submit('Submit') }}
</div>
{{ Form::close() }}

@stop