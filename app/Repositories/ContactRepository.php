<?php

namespace App\Repositories;

use App\Models\ContactModel;

class ContactRepository
{
    private $contactModel;

    public function __construct()
    {
        $this->contactModel = new ContactModel();
    }

    public function CreateContacts($request)
    {
            $this->contactModel->create([
            "email" => $request->get("email"),
            "subject" => $request->get("subject"),
            "message" => $request->get("message")
             ]);
    }

    public function delete($contact)
    {
       return $this->contactModel->where(['id' => $contact])->first();
    }

    public function edit($id)
    {
        return $this->contactModel->where(['id' => $id])->first();
    }

    public function getContactByID($id)
    {
       return $this->contactModel->where(['id' => $id])->first();
    }
    public function SaveContact($contact, $request)
    {
        $contact->email = $request->get("email");
        $contact->subject = $request->get("subject");
        $contact->message = $request->get("message");
    }
}
