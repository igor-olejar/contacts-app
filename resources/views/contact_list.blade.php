<!-- resources/views/contact_list.blade.php -->

@extends('layouts.master')

@section('content')
<div class="row">
    <h1>Contact List</h1>
    <p>
        <a href="/add" class="btn btn-primary">Add New Contact</a>
    </p>
</div>
<div class="row" id="filters">
    Filter contacts:
    <p>
        First Name: {!! Form::text('first_name') !!} Last Name: {!! Form::text('last_name') !!} Email: {!! Form::email('email') !!}
    </p>
    <p>
        {!! Form::button('Apply Filters', ['class' => 'btn btn-primary']) !!} {!! Form::button('Clear Filters', ['class' => 'btn btn-secondary']) !!}
    </p>
</div>
<div class="row" id="contact-list">
    <h2>Contact List</h2>
    @if (!empty($contacts))
        <table class="table table-striped table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email Address</th>
                    <th>Telephone Number</th>
                </tr>
            <thead>
            <tbody>
            @foreach ($contacts as $contact)
                <tr>
                    <td>{{ $contact->first_name }}</td>
                    <td>{{ $contact->last_name }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->telephone }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-warning">There are no contacts available, please Add New Contact</div>
    @endif
</div>
@endsection