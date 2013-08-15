@extends('layouts.scaffold')

@section('main')

<h1>Create User</h1>

{{ Form::open() }}
<ul>
    <li>
        {{ Form::label('real_name', 'Real Name:') }}
        {{ Form::text('real_name') }}
        {{ $errors->first('real_name', '<span class="help-inline">:message</
            span>') }}
    </li>

    <li>
        {{ Form::label('email', 'Email:') }}
        {{ Form::email('email') }}
        {{ $errors->first('email', '<span class="help-inline">:message</
            span>') }}
    </li>
    <li>
        {{ Form::label('password', 'Password:') }}
        {{ Form::password('password') }}
        {{ $errors->first('password', '<span class="help-inline">:message</
            span>') }}
    </li>

    <li>
        {{ Form::submit('Create User', array('class' => 'btn btn-primary')) }}
        {{ HTML::link('users/create', 'Cancel', array('class' => 'btn btn-info')) }}
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