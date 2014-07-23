@extends('layout.admin');

@section('content')

<h1>User measurements</h1>

@foreach ($userSizes as $userSizes)
<li>{{ 'ID = '.$userSizes->sizes_id; }}</li>
@endforeach

<a href="/users/{{$userSizes->users_id}}/sizes/create">Create new measurement</a>

@stop
