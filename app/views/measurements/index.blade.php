@extends('layout.admin');

@section('content')

<h1> ALL measurements </h1>

@foreach ($measurements as $measurement)
<a href="/sizes/{{$measurement->sizes_id}}/measurements/{{$measurement->id}}"><li>{{ 'ID = '.$measurement->id; }}</li></a>
@endforeach

<a href="/sizes/{{$measurement->sizes_id}}/measurements/create">Create new measurement</a>

@stop
