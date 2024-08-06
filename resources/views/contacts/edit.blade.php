@extends('layouts.app')

@section('content')
    <h1>Edit Contact</h1>
    <form action="{{ route('contacts.update', $contact->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="first_name">First Name</label>
        <input type="text" name="first_name" id="first_name" value="{{ $contact->first_name }}" required>
        
        <label for="last_name">Last Name</label>
        <input type="text" name="last_name" id="last_name" value="{{ $contact->last_name }}" required>
        
        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="{{ $contact->email }}" required>
        
        <label for="phone">Phone</label>
        <input type="text" name="phone" id="phone" value="{{ $contact->phone }}">
        
        <label for="address">Address</label>
        <textarea name="address" id="address">{{ $contact->address }}</textarea>
        
        <button type="submit">Update</button>
    </form>
@endsection
