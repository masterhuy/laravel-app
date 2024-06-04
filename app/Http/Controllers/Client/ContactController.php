<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Http\Requests\Contact\CreateContactRequest;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        return view('client.contact.index');
    }

    public function store(Request $request){
        $dataCreate = $request->all();
        Contact::create($dataCreate);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        Mail::to($dataCreate['email'])->send(new \App\Mail\ContactMail($validatedData));

        return to_route('send-contact')->with(['message' => 'Send message successfully']);
    }
}
