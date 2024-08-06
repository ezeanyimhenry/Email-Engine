@extends('layouts.app')

@section('content')
    <h1>Add New Contact</h1>
    <form action="{{ route('contacts.store') }}" method="POST">
        @csrf
        <label for="first_name">First Name</label>
        <input type="text" name="first_name" id="first_name" required>
        
        <label for="last_name">Last Name</label>
        <input type="text" name="last_name" id="last_name" required>
        
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required>
        
        <label for="phone">Phone</label>
        <input type="text" name="phone" id="phone">
        
        <label for="address">Address</label>
        <textarea name="address" id="address"></textarea>
        
        <button type="submit">Save</button>
    </form>
@endsection
