<?php

namespace App\Http\Controllers;

use App\Models\Contact;
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


    public function saveContact()
    {

    }
}
