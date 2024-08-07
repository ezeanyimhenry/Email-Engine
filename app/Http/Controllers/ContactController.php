<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ContactsImport;
use App\Exports\ContactsExport;

class ContactController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user instanceof User) {
            $contacts = $user->contacts()->paginate(10);
            return inertia('Contacts/Index', [
                'contacts' => $contacts
            ]);
        } else {
            abort(403, 'Unauthorized action.');
        }
    }

    public function create()
    {
        return inertia('Contacts/Create');
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
            abort(403, 'Unauthorized action.');
        }
    }

    public function show($id)
    {
        $user = auth()->user();

        if ($user instanceof User) {
            $contact = $user->contacts()->findOrFail($id);
            return inertia('Contacts/Show', [
                'contact' => $contact
            ]);
        } else {
            abort(403, 'Unauthorized action.');
        }
    }

    public function edit($id)
    {
        $user = auth()->user();

        if ($user instanceof User) {
            $contact = $user->contacts()->findOrFail($id);
            return inertia('Contacts/Edit', [
                'contact' => $contact
            ]);
        } else {
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
            abort(403, 'Unauthorized action.');
        }
    }

    public function bulkUpload(Request $request)
    {
        $request->validate([
            'file' => 'required|file|max:2048',
        ]);

        Excel::import(new ContactsImport, $request->file('file'));

        return redirect()->route('contacts.index');
    }

    public function export()
    {
        return Excel::download(new ContactsExport, 'contacts.xlsx');
    }
}
