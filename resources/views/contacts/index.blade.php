@extends('layouts.app')

@section('content')
    <h1>Contacts</h1>
    <a href="{{ route('contacts.create') }}">Add New Contact</a>
    <ul>
        @foreach ($contacts as $contact)
            <li>
                <a href="{{ route('contacts.show', $contact->id) }}">{{ $contact->first_name }} {{ $contact->last_name }}</a>
                <a href="{{ route('contacts.edit', $contact->id) }}">Edit</a>
                <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
