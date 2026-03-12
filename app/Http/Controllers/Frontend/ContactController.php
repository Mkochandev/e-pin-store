<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index() {
        $contact = Contact::first();
        return view('web.pages.contact', compact('contact'));
    }
    public function sendMessage(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'message' => 'required'
    ]);

    \App\Models\ContactMessage::create($request->all());

    return back()->with('success', 'Mesajınız başarıyla iletildi.');
}
}
