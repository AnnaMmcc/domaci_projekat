<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendContactRequest;
use App\Models\ContactModel;
use App\Repositories\ContactRepository;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    private $ContactRepo;

    public function __construct()
    {
        $this->ContactRepo = new ContactRepository();
    }

    public function index()
    {
       return view("contact");
    }
    public function getAllContacts()
    {
        $allContacts = ContactModel::all();

        return view("allContacts", compact("allContacts"));
    }
    public function sendContact(SendContactRequest $request)
    {
        $this->ContactRepo->CreateContacts($request);

        return redirect()->back();

    }

    public function delete($contact)
    {
        //$singleContacts = ContactModel::where(['id' => $contact])->first();
        $singleContacts = $this->ContactRepo->delete($contact);

        if($singleContacts === null)
        {
            die("NEPOSTOJECI KONTAKT");
        }

        $singleContacts->delete();

        return redirect()->back();
    }

    public function editContact(Request $request, $id)
    {
        //$contact = ContactModel::where(['id' => $id])->first();
        $contact = $this->ContactRepo->edit($id);

        if ($contact === null) {
            die("Nepostojeci kontakt");
        }

        return view("contacts/edit", compact("contact"));
    }

     public function saveContact(Request $request, $id)
     {
        //$contact = ContactModel::where(['id' => $id])->first();
         $contact = $this->ContactRepo->getContactByID($id);
       if($contact === null)
       {
            die("Nepostojeci kontakt");
       }
        $this->ContactRepo->SaveContact($contact, $request);
        $contact->save();

        return redirect()->back();
    }

}




