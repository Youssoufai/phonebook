<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // 
    public function index()
    {

        $contacts = Auth::user()->contacts()->latest()->paginate(6);
        return view('contact.form', ['contacts' => $contacts]);
    }
}
