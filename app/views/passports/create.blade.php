@extends('layouts.scaffold')

@section('main')

<h1>Create User Passports</h1>

{{ Form::open() }}
<ul>
    <li>
        {{ Form::label('user_id', 'Real Name:') }}
        {{ Form::select('user_id', $user, 1) }}
        {{ $errors->first('user_id', '<span class="help-inline">:message</
            span>') }}
    </li>

    <li>
        {{ Form::label('number', 'Number:') }}
        {{ Form::text('number') }}
        {{ $errors->first('number', '<span class="help-inline">:message</
            span>') }}
    </li>

    <li>
        {{ Form::submit('Create Passport', array('class' => 'btn btn-primary')) }}
        {{ HTML::link('passports/create', 'Cancel', array('class' => 'btn btn-info')) }}
        {{ HTML::link('passports', 'Back', array('class' => 'btn btn-danger')) }}
    </li>
</ul>
{{ Form::close() }}

@if ($errors->any())
<ul>
    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
</ul>
@endif
@stop