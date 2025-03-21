<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index() {
        $contacts = Contact::all();
        return view('backend.contact.index', compact('contacts'));
    }
    
    public function create() {
        return view('backend.contact.create');
    }
    
    public function store(Request $request) {
        $request->validate([
            'location' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|regex:/^\+?[0-9]{10,14}$/',
            'check_in_time' => 'required',
            'check_out_time' => 'required',
        ]);
        
        Contact::create($request->all());
        
        return redirect()->route('backend.contact.index')->with('success', 'Contact added successfully.');
    }
    
    public function edit(Contact $contact) {
        return view('backend.contact.edit', compact('contact'));
    }
    
    public function update(Request $request, Contact $contact) {
        $request->validate([
            'location' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|regex:/^\+?[0-9]{10,14}$/',
            'check_in_time' => 'required',
            'check_out_time' => 'required',
        ]);
        
        $contact->update($request->all());
        
        return redirect()->route('backend.contact.index')->with('success', 'Contact updated successfully.');
    }
    
    public function destroy(Contact $contact) {
        $contact->delete();
        
        return redirect()->route('backend.contact.index')->with('success', 'Contact deleted successfully.');
    }
}
