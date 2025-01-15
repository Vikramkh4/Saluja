<?php

namespace App\Http\Controllers;

use App\Models\Contact;
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
        $contacts = Contact::all(); 
        return view('contacts.index',compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'type' => 'required|string|max:255',
            'person_name' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|email',
            'remark' => 'nullable|string',
            'gst_treatment' => 'nullable|string',
            'billing_address_line_one' => 'required|string|max:255',
            'billing_address_line_two' => 'nullable|string|max:255',
            'billing_city' => 'required|string|max:100',
            'billing_state' => 'required|string|max:100',
            'billing_pincode' => 'required|string|max:10',
            'billing_country' => 'required|string|max:100',
            'shipping_address_line_one' => 'required|string|max:255',
            'shipping_address_line_two' => 'nullable|string|max:255',
            'shipping_city' => 'required|string|max:100',
            'shipping_state' => 'required|string|max:100',
            'shipping_pincode' => 'required|string|max:10',
            'shipping_country' => 'required|string|max:100',
        ]);
        $validated['created_by']=Auth::user()->name ;
        // Create the contact record
        Contact::create($validated);

        return redirect()->route('contacts.index')->with('success', 'Contact created successfully');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $contact = Contact::findOrFail($id);
        return view('contacts.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        
        $contact=Contact::findOrFail($id);
    //    dd($contact);
        return view('contacts.edit',compact('contact'));
    
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $data = $request->validate([
            'type' => 'required|string|max:255',
            'person_name' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|email',
            'remark' => 'nullable|string',
            'gst_treatment' => 'nullable|string',
            'billing_address_line_one' => 'required|string|max:255',
            'billing_address_line_two' => 'nullable|string|max:255',
            'billing_city' => 'required|string|max:100',
            'billing_state' => 'required|string|max:100',
            'billing_pincode' => 'required|string|max:10',
            'billing_country' => 'required|string|max:100',
            'shipping_address_line_one' => 'required|string|max:255',
            'shipping_address_line_two' => 'nullable|string|max:255',
            'shipping_city' => 'required|string|max:100',
            'shipping_state' => 'required|string|max:100',
            'shipping_pincode' => 'required|string|max:10',
            'shipping_country' => 'required|string|max:100',
        ]);
        $data['created_by'] = Auth::user()->name;
        $contact = Contact::findOrFail($id); $contact->update($data); 
        return redirect()->route('contacts.index')->with('success', 'Contact updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $contact=Contact::findOrFail($id);
        $contact->delete();
        return  redirect()->route('contacts.index')->with('success','Contact deleted successfully');

    }
}
