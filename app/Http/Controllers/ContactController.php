<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeMail;
use App\Models\Contact;
use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class ContactController extends Controller implements HasMiddleware
{
    /**
     * Display a listing of the resource.
     */
    public static function middleware(): array
    {
        return [
            new Middleware('auth', except: ['index', 'show'])
        ];
    }
    public function index()
    {
        //
        Mail::to('learn@gmail.com')->send(new WelcomeMail());
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
            'email' => ['required', 'max:300', 'unique:users'],
            'image' => ['nullable', 'file', 'max:3000', 'mimes:webp,png,jpg']
        ]);


        // Store image if exists
        $path = null;
        if ($request->hasFile('image')) {
            $path = Storage::disk('public')->put('contact_images', $request->image);
        }

        Storage::disk('public')->put('contact_images', $request->image);


        // Create a post


        Auth::user()->contacts()->create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'image' => $path
        ]);

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
        Gate::authorize('modify', $contact);



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
            'email' => ['required', 'max:300', 'unique:users'],
            'image' => ['nullable', 'file', 'max:3000', 'mimes:webp,png,jpg']
        ]);
        if ($contact->image) {
            Storage::disk('public')->delete($contact->image);
        }

        // Store image if exists
        $path = $contact->image ?? null;
        if ($request->hasFile('image')) {
            if ($contact->image) {
                Storage::disk('public')->delete($request->image);
            }
            $path = Storage::disk('public')->put('contact_images', $request->image);
        }



        // Update a post
        $contact->update([
            'name' => $contact->name,
            'phone' => $contact->phone,
            'email' => $contact->email,
            'image' => $path
        ]);

        // redirect to dashboard
        return redirect()->route('dashboard')->with('success', 'A new contact was edited');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        //delete image if exists

        if ($contact->image) {
            Storage::disk('public')->delete($contact->image);
        }

        $contact->delete();

        return back()->with('delete', 'Your post was deleted');
    }
}
