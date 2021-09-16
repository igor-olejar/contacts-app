<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Rules\Telephone;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

use function strtoupper;

class ContactsController extends Controller
{


    public function showContacts(Request $request): View
    {
        $contacts = Contact::select('*');

        if ($request->first_name !== null) {
            $contacts = $contacts->where(DB::raw('UPPER(first_name)'), 'like', '%' . strtoupper($request->first_name) . '%');
        }

        if ($request->last_name !== null) {
            $contacts = $contacts->where(DB::raw('UPPER(last_name)'), 'like', '%' . strtoupper($request->last_name) . '%');
        }

        if ($request->email !== null) {
            $contacts = $contacts->where(DB::raw('UPPER(email)'), 'like', '%' . strtoupper($request->email) . '%');
        }

        $contacts = $contacts->orderBy('last_name')->orderBy('first_name')->get();

        return view('contact_list', [
            'contacts' => $contacts,
            'first_name_filter' => $request->first_name,
            'last_name_filter' => $request->last_name,
            'email_filter' => $request->email,
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
