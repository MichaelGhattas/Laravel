@extends('layout.admin');

@section('content')

<h1>Show Measurement, Non editable</h1>

{{ Form::model($measurement) }}

<div>
    <h2>Show measurements</h2>
    
    {{ $measurement->sizes_id }}
    
    {{ Form::label('measurementType_id','Type: ') }}
    {{ Form::select('measurementType_id', $measurementType); }}
    {{ $errors->first('measurementType_id') }}
    
    {{ Form::label('cm','CM: ') }}
    {{ Form::input('text','cm') }}
    {{ $errors->first('cm') }}
    
    {{ Form::label('inch','INCHES: ') }}
    {{ Form::input('text','inch') }}
    {{ $errors->first('inch') }}
    
    {{ Form::label('eu','EU: ') }}
    {{ Form::input('text','eu') }}
    {{ $errors->first('eu') }}
    
    {{ Form::label('us','US: ') }}
    {{ Form::input('text','us') }}
    {{ $errors->first('us') }}
</div>

<a href="/sizes/{{ $measurement->sizes_id}}/measurements/{{ $measurement->id}}/edit" class="btn btn-default">Edit</a>
{{ Form::open(['action'=>['sizes.measurements.destroy',$measurement->id],'method'=>'DELETE']); }}
<div>
    {{ Form::submit('Delete') }}
</div>

{{ Form::close(); }}

@stop