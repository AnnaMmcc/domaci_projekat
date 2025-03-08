<?php

namespace App\Http\Controllers;

use App\Models\ContactModel;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view("contact");
    }
    public function getAllContacts()
    {
        $allContacts = ContactModel::all();

        return view("allContacts", compact("allContacts"));
    }
    public function sendContact(Request $request)
    {
        $request->validate([
            "email"=> "required|string",
            "subject" => "required|string",
            "description" => "required|string|min:5|max:255"
        ]);


        ContactModel::create([
            "email" => $request->get("email"),
            "subject" => $request->get("subject"),
            "message" => $request->get("description")
        ]);

    }

    public function delete($contact)
    {
        $singleContacts = ContactModel::where(['id' => $contact])->first();

        if($singleContacts === null)
        {
            die("NEPOSTOJECI KONTAKT");
        }

        $singleContacts->delete();

        return redirect()->back();
    }

    public function editContact(Request $request, $id)
    {
        $contact = ContactModel::where(['id' => $id])->first();

        if ($contact === null) {
            die("Nepostojeci kontakt");
        }

        return view("contacts/edit", compact("contact"));
    }

     public function saveContact(Request $request, $id)
     {
        $contact = ContactModel::where(['id' => $id])->first();

       if($contact === null)
       {
            die("Nepostojeci kontakt");
       }

        $contact->email = $request->get("email");
        $contact->subject = $request->get("subject");
        $contact->message = $request->get("message");

        $contact->save();

        return redirect()->back();
    }

}




