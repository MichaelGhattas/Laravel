@extends('layout.admin');

@section('content')

<h1>Show size, Non editable</h1>
<p>Size ID = {{ $size->id; }}</p>

{{ Form::model($size) }}

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

<a href="/sizes/{{ $size->id}}/edit" class="btn btn-default">Edit</a>
{{ Form::open(['action'=>['sizes.destroy',$size->id],'method'=>'DELETE']); }}
<div>
    {{ Form::submit('Delete') }}
</div>

<div>
    <h3>Measurements</h3>
    @foreach ($measurements as $measurement)
    <a href="/sizes/{{$size->id}}/measurements/{{$measurement->id}}/"><li>{{ 'ID = '.$measurement->id.', CM = '.$measurement->cm.', Inch = '.$measurement->inch.'Meas type = '.$measurementType[$measurement->measurementType_id]; }}</li></a>
    @endforeach
</div>

{{ Form::close(); }}

@stop