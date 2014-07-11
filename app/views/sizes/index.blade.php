@extends('layout.admin');

@section('content')

<h1> ALL sizes </h1>

@foreach ($sizes as $size)
<a href="/sizes/{{$size->id}}"><li>{{ 'ID = '.$size->id.', Brand = '.$size->brands_id.', Region = '.$size->regions_id; }}</li></a>
@endforeach

@stop

@section('footer')
<h1>footer</h1>
@stop