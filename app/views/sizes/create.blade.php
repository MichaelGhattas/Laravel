@extends('layout.admin');

@section('content');

<h2>Select criteria</h2>

{{ Form::open(['route' => 'sizes.store']) }}

<div>
    {{ Form::label('garments_id','Garment: ') }}
    {{ Form::select('garments_id', $garments); }}
    {{ $errors->first('garments_id') }}
    
    {{ Form::label('brands_d','Brand: ') }}
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
<!--<div>
    <h2>Add measurements</h2>
    
    {{ Form::label('measurementType_id','Type: ') }}
    {{ Form::select('measurementType_id', $measurementType); }}
    {{ $errors->first('measurementType_id') }}
    
    {{ Form::label('cm','CM: ') }}
    {{ Form::input('text','cm') }}
    {{ $errors->first('cm') }}
    
    {{ Form::label('inches','INCHES: ') }}
    {{ Form::input('text','inches') }}
    {{ $errors->first('inches') }}
    
    {{ Form::label('eu','EU: ') }}
    {{ Form::input('text','eu') }}
    {{ $errors->first('eu') }}
    
    {{ Form::label('us','US: ') }}
    {{ Form::input('text','us') }}
    {{ $errors->first('us') }}
</div>-->
<div>
    {{ Form::submit('Submit') }}
</div>
{{ Form::close() }}