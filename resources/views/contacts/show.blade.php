@extends('layouts.app')

@section('content')
    <h1>Contact Details</h1>
    <p>Name: {{ $contact->first_name }} {{ $contact->last_name }}</p>
    <p>Email: {{ $contact->email }}</p>
    <p>Phone: {{ $contact->phone }}</p>
    <p>Address: {{ $contact->address }}</p>
    <a href="{{ route('contacts.edit', $contact->id) }}">Edit</a>
    <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
    <a href="{{ route('contacts.index') }}">Back to Contacts</a>
@endsection
