<?php

namespace App\Http\Controllers;

use App\Http\Resources\ContactResource;
use App\Models\Contact;
use App\Models\Email;
use App\Models\Phone;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //* Show all contacts, search for contact, pagination latest()
    public function index(Request $request)
    {
        $contacts = Contact::where([
            ['name', '!=', Null],
            [function ($query) use ($request) {
                if ($name = $request->name) {
                    $query->where('name', 'like', '%' . $name . '%')->get();
                }
            }]
        ])->orderBy("created_at", "desc")->paginate(15);

        return view('contacts.index', compact('contacts'));
    }

    //* Load create page
    public function loadCreatePage()
    {
        return view('contacts.store');
    }

    //* Create a contact, email, phone with validation
    public function store(Request $request)
    {
        // dd($request->input());
        $contact = Contact::create($this->makeValidation($request));
        $phones = [];
        foreach ($request->phone as $key => $phone) {
            if ($phone) {
                $phones[] = new Phone([
                    'phone' => $phone
                ]);
            }
        }
        $contact->phones()->saveMany($phones);

        $emails = [];
        foreach ($request->email as $key => $email) {
            if ($email) {
                $emails[] = new Email([
                    'email' => $email
                ]);
            }
        }
        $contact->emails()->saveMany($emails);
        return redirect('contacts');
    }

    //* Load edit page
    public function edit(Contact $contact)
    {
        return view('contacts.edit', compact('contact'));
    }

    //* Update contact, email, phone 
    public function update($contact)
    {
        Contact::updateOrCreate(
            ['id' => $contact],
            ['name' => request('name'), 'address' => request('address')]
        );

        Email::updateOrCreate(
            ['contact_id' => $contact],
            ['email' => request('email')]
        );

        Phone::updateOrCreate(
            ['contact_id' => $contact],
            ['phone' => request('phone')]
        );

        return redirect('contacts');
    }

    //* Delete contact by its Id
    public function destroy($contact)
    {
        Contact::where('id', $contact)->delete();
        return redirect('contacts');
    }

    //* Make validation
    public function makeValidation(Request $request)
    {
        return $request->validate([
            'name' => 'required|string|min:2|max:255',
            'address' => 'required',
            'email' => 'nullable|array',
            'email.*' => 'nullable|email|min:3',
            'phone' => 'nullable|array',
            'phone.*' => 'nullable|integer',
        ]);
    }
}
