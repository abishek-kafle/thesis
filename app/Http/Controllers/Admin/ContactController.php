<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ContactController extends Controller
{
    // Index
    public function index(){
        Session::put('admin_page', 'contact');
        $contact = Contact::orderBy('id', 'desc')->first();
        return view('admin.contact.contact', compact('contact'));
    }

    // Update
    public function update(Request $request, $id){
        $data = $request->validate([
            'email' => 'nullable|email',
            'phone' => 'nullable|numeric',
            'address' => 'nullable|string'
        ]);
        $contact = Contact::findOrFail($id);
        $contact->email = $data['email'];
        $contact->phone = $data['phone'];
        $contact->address = $data['address'];
        $contact->update();
        Session::flash('success_message', 'Contact updated Successfully');
        return redirect()->back();
    }
}
