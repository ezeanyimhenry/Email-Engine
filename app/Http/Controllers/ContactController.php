<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\User;

class ContactController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        
        if ($user instanceof User) {
            $contacts = $user->contacts;
            return view('contacts.index', compact('contacts'));
        } else {
            // Handle the case where auth()->user() is not a User instance
            abort(403, 'Unauthorized action.');
        }
    }

    public function create()
    {
        return view('contacts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:contacts,email',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
        ]);

        $user = auth()->user();
        
        if ($user instanceof User) {
            $user->contacts()->create($request->all());
            return redirect()->route('contacts.index');
        } else {
            // Handle the case where auth()->user() is not a User instance
            abort(403, 'Unauthorized action.');
        }
    }

    public function show($id)
    {
        $user = auth()->user();
        
        if ($user instanceof User) {
            $contact = $user->contacts()->findOrFail($id);
            return view('contacts.show', compact('contact'));
        } else {
            // Handle the case where auth()->user() is not a User instance
            abort(403, 'Unauthorized action.');
        }
    }

    public function edit($id)
    {
        $user = auth()->user();
        
        if ($user instanceof User) {
            $contact = $user->contacts()->findOrFail($id);
            return view('contacts.edit', compact('contact'));
        } else {
            // Handle the case where auth()->user() is not a User instance
            abort(403, 'Unauthorized action.');
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
        ]);

        $user = auth()->user();
        
        if ($user instanceof User) {
            $contact = $user->contacts()->findOrFail($id);
            $contact->update($request->all());
            return redirect()->route('contacts.index');
        } else {
            // Handle the case where auth()->user() is not a User instance
            abort(403, 'Unauthorized action.');
        }
    }

    public function destroy($id)
    {
        $user = auth()->user();
        
        if ($user instanceof User) {
            $user->contacts()->findOrFail($id)->delete();
            return redirect()->route('contacts.index');
        } else {
            // Handle the case where auth()->user() is not a User instance
            abort(403, 'Unauthorized action.');
        }
    }
}
