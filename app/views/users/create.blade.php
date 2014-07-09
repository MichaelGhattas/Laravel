@extends('layout.default');

@section('content');

<h2>Create user</h2>

{{ Form::open(['route' => 'users.store']) }}
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
    {{ Form::label('email','Email: ') }}
    {{ Form::input('text','email') }}
    {{ $errors->first('email') }}
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