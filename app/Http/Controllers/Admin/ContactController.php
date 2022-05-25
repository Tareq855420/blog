<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function addContact()
    {
        return view('admin.contact.add');
    }
    public function newContact(Request $request)
    {
        Contact::saveContact($request);
        return redirect()->back()->with('message', 'Contact Added Successfully.');
    }
    public function manageContact()
    {
        return view('admin.contact.manage', [
            'contacts' => Contact::latest()->get(),
        ]);
    }
    public function editContact($id)
    {
        return view('admin.contact.edit', [
            'contact' => Contact::find($id),
        ]);
    }
    public function updateContact(Request $request, $id)
    {
        Contact::updateContact($request, $id);
        return redirect('/manage-contact')->with('message', 'Contact Updated Successfully.');
    }
    public function deleteContact($id)
    {
        Contact::deleteContact($id);
        return redirect('/manage-contact')->with('message','Contact Deleted Successfully');
    }
}
