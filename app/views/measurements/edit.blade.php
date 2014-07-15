@extends('layout.admin');

@section('content');

{{ Form::model($measurement,['action' => ['sizes.measurements.update', $measurement->sizes_id, $measurement->id],'method' => 'PUT']) }}

<div>
    <h2>Add measurements</h2>
    
    <p>Size ID = {{ $measurement->sizes_id }}, ID = {{ $measurement->id}}</p>
    
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
<div>
    {{ Form::submit('Submit') }}
</div>
{{ Form::close() }}