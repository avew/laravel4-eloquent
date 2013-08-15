@extends('layouts.scaffold')

@section('main')

<h1>Update User</h1>

{{Form::open()}}
<ul>
    <li>
        {{ Form::label('real_name', 'Real Name:') }}
        {{ Form::text('real_name', $user->real_name) }}
    </li>
    <li>
        {{ Form::label('email', 'Email:') }}
        {{ Form::email('email', $user->email) }}
    </li>
    <li>
        {{ Form::label('password', 'Password:') }}
        {{ Form::password('password') }}
    </li>
    <li>
        {{Form::submit('Update User', array('class' => 'btn btn-primary'))}}
        {{ HTML::link('users', 'Back', array('class' => 'btn btn-danger')) }}
    </li>
</ul>

{{ Form::close() }}

@if ($errors->any())
<ul>
    {{ implode('', $errors->all('<li class="error">:message</li>')) }}

</ul>

@endif

@stop