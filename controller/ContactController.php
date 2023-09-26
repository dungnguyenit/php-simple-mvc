<?php

class ContactController {

    public function index() {
        // Create an instance of the ContactModel
        $contactModel = new ContactModel();

        // Retrieve the list of contacts from the model
        $contacts = $contactModel->getContacts();

        // Include the HTML template for the list of contacts
        include 'view/contacts/list.php';

    }

    public function create() {
        include 'view/contacts/create.php';

    }
}
