@extends('layouts.scaffold')

@section('main')

<h1>Update User Passports</h1>

{{Form::open()}}
<ul>
    <li>
        {{ Form::label('user_id', 'Real Name:') }}
        {{ Form::text('user_id', $passport->users->real_name) }}
    </li>

    <li>
        {{ Form::label('number', 'Number:') }}
        {{ Form::text('number',$passport->number) }}
    </li>
    <li>
        {{Form::submit('Update User Passport', array('class' => 'btn btn-primary'))}}
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