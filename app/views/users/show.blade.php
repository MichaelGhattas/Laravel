<h1>Hello {{ $user->firstName.' '.$user->secondName; }}</h1>
<p>Email = {{ $user->email; }}</p>

<a href="/users/{{ $user->id}}/edit" class="btn btn-default">Edit</a>
{{ Form::open(['action'=>['users.destroy',$user->id],'method'=>'DELETE']); }}
<div>
    {{ Form::submit('Delete') }}
</div>

{{ Form::close(); }}