@extends('layout.admin');

@section('content')

<h1> ALL measurements </h1>

@foreach ($measurements as $measurement)
<a href="/sizes/{{$measurement->sizes_id}}/measurements/{{$measurement->id}}"><li>{{ 'ID = '.$measurement->id; }}</li></a>
@endforeach

@stop

@section('footer')
<h1>footer</h1>
@stop