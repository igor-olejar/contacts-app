<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Rules\Telephone;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContactsController extends Controller
{


    public function showContacts(): View
    {
        $contacts = Contact::orderBy('last_name')
            ->orderBy('first_name')
            ->get();

        return view('contact_list', [
            'contacts' => $contacts,
        ]);
    }


    public function addContact(): View
    {
        return view('add_contact');
    }


    /**
     * @return void
     */
    public function saveContact(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|alpha|max:255',
            'last_name' => 'required|alpha|max:255',
            'email' => 'required|email|max:255',
            'telephone' => ['required', new Telephone],
        ]);

        if ($validated) {
            $contact = new Contact;

            $contact->first_name = $request->first_name;
            $contact->last_name = $request->last_name;
            $contact->email = $request->email;
            $contact->telephone = $request->telephone;

            $contact->save();
        }

        return redirect('/'); 
    }
}
