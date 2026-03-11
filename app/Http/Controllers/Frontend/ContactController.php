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
}
