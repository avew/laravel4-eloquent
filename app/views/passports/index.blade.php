@extends('layouts.scaffold')

@section('main')

<h1>Users Passport</h1>
<p>
    <?php $create_link_btn = array('class' => 'btn btn-primary') ?>
    {{ HTML::link('passports/create','Create User Password',$create_link_btn)}}
</p>
@if ($passports->count())
<table class="table table-striped table-condensed">
    <thead>
        <tr>
            <th>#</th>
            <th>User Id</th>
            <th>Number</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        @foreach($passports as $passport)
        <tr>
            <td>{{{ $passport->id}}} </td>
            <td>{{{ $passport->users->real_name }}} </td>
            <td>{{{ $passport->number }}}</td>
            <td>
                {{HTML::link('passports/update/'.$passport->id, 'Update', array('class'=> 'btn btn-info')) }}
                {{ HTML::link('passports/delete/'.$passport->id, 'Delete', array('class' => 'btn btn-danger')) }}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
There are no users
@endif
@stop

