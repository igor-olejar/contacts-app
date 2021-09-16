
<!-- resources/views/add_contact.blade.php -->

@extends('layouts.master')

@section('content')
<div class="row">
    <h1>Add New Contact</h1>
    <p>All fields are required</p>

    {!! Form::open(['url' => '/add']) !!}
        <p>
            {!! Form::label('first_name', 'First Name') !!}
            {!! Form::text('first_name', '', ['required' => 'required']) !!}
        </p>
        <p>
            {!! Form::label('last_name', 'Last Name') !!}
            {!! Form::text('last_name', '', ['required' => 'required']) !!}
        </p>
        <p>
            {!! Form::label('email', 'Email Address') !!}
            {!! Form::email('email', '', ['required' => 'required']) !!}
        </p>
        <p>
            {!! Form::label('telephone', 'Telephone') !!}
            {!! Form::text('telephone', '', ['required' => 'required']) !!}
        </p>
        <p>
            {!! Form::submit('Add') !!}
        </p>
    {!! Form::close() !!}
</div>
@endsection