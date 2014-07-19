@extends('layout.admin');

@section('content');

<h2>Edit user</h2>
<p>Email: {{ $user->email }}</p>
{{ Form::model($user,['action' => ['users.update',$user->id],'method' => 'PUT']) }}
<div>
    {{ Form::label('firstName','First Name: ') }}
    {{ Form::input('text','firstName') }}
    {{ $errors->first('firstName') }}
</div>
<div>
    {{ Form::label('secondName','Second Name: ') }}
    {{ Form::input('text','secondName') }}
    {{ $errors->first('secondName') }}
</div>
<div>
    {{ Form::label('password','Password: ') }}
    {{ Form::input('password','password') }}
    {{ $errors->first('password') }}
</div>
<div>
    {{ Form::submit('Submit') }}
</div>
{{ Form::close() }}

@stop