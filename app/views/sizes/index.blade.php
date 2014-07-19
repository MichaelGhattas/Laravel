@extends('layout.admin');

@section('content')

<h1> ALL sizes </h1>

@foreach ($sizes as $size)
<a href="/sizes/{{$size->id}}"><li>{{ 'ID = '.$size->id.', Brand = '.$size->brands_id.', Region = '.$size->regions_id; }}</li></a>
@endforeach

<a href="/sizes/create">Create new size</a>

@stop
