@extends('layout.admin');

@section('content')

<h1> ALL Users </h1>

@foreach ($users as $user)
<a href="/users/{{$user->id}}"><li>{{ $user->firstName; }}</li></a>
@endforeach

@stop
