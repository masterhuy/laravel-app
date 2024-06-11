<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        $contacts = Contact::latest()->paginate(5);
        return view('admin.contacts.index', compact('contacts'));
    }

    public function edit($id){
        $contact = Contact::find($id);
        return view('admin.contacts.edit', compact('contact'));
    }

    public function update(Request $request, $id){
        $contact = Contact::find($id);
        $dataUpdate = $request->all();
        $contact->update($dataUpdate);
        return redirect()->route('contacts.index')->with(['message' => 'Update contact successfully']);
    }

    public function destroy($id){
        $contact = Contact::find($id);
        $contact->delete();
        return redirect()->route('contacts.index')->with(['message' => 'Delete contact successfully']);
    }
}
