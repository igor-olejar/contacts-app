
<!-- resources/views/add_contact.blade.php -->

@extends('layouts.master')

@section('content')
<div class="row">
    <h1>Add New Contact</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <p>All fields are required</p>

    {!! Form::open(['url' => '/add']) !!}
        <div class="form-group">
            {!! Form::label('first_name', 'First Name') !!}
            {!! Form::text('first_name', '', ['required' => 'required', 'class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('last_name', 'Last Name') !!}
            {!! Form::text('last_name', '', ['required' => 'required', 'class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('email', 'Email Address') !!}
            {!! Form::email('email', '', ['required' => 'required', 'class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('telephone', 'Telephone') !!}
            {!! Form::text('telephone', '', ['required' => 'required', 'class' => 'form-control']) !!}
        </div>
        <div class="form-group" style="margin-top: 10px;">
            {!! Form::submit('Add', ['class' => 'btn btn-primary']) !!}
            <a href='/' class="btn btn-secondary">Cancel</a>
        </div>
    {!! Form::close() !!}
</div>
@endsection
