@extends('layouts.scaffold')

@section('main')

<h1>All Users</h1>

<p>
    <?php $create_link_btn = array('class' => 'btn btn-primary') ?>
    {{ HTML::link('users/create','Create User',$create_link_btn)}}
</p>
@if ($users->count())
<table class="table table-striped table-condensed">
    <thead>
        <tr>
            <th>#</th>
            <th>Real Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($users as $user)
        <tr>
            <td>{{{ $user->id }}} </td>
            <td>{{{ $user->real_name }}} </td>
            <td>{{{ $user->email }}}</td>
            <td>{{HTML::link('users/update/'.$user->id, 'Update', array('class'=> 'btn btn-info')) }}  {{ HTML::link('users/delete/'.$user->id, 'Delete', array('class' => 'btn btn-danger')) }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
There are no users
@endif
@stop





