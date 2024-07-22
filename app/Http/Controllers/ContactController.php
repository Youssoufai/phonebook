<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $contact = Contact::latest()->paginate(6);
        return view('contact.dashboard', ['contacts' => $contact]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $contacts = Auth::user()->contacts;
        return view('contact.form', ['contacts' => $contacts]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate
        $fields = $request->validate([
            'name' => ['required', 'max:300'],
            'phone' => ['required', 'max_digits:20'],
            'email' => ['required', 'max:300', 'unique:users']
        ]);

        // Create a post
        Auth::user()->contacts()->create($fields);

        // redirect to dashboard
        return back()->with('success', 'A new contact was created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        //
        return view('contact.edit', ['contact' => $contact]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        //
        $fields = $request->validate([
            'name' => ['required', 'max:300'],
            'phone' => ['required', 'max_digits:20'],
            'email' => ['required', 'max:300', 'unique:users']
        ]);

        // Update a post
        $contact->update($fields);

        // redirect to dashboard
        return redirect()->route('dashboard')->with('success', 'A new contact was edited');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        //
        $contact->delete();
    }
}
