<?php

class ContactController
{

    public function index()
    {
        // Create an instance of the ContactModel
        $contactModel = new ContactModel();

        // Retrieve the list of contacts from the model
        $contacts = $contactModel->getContacts();

        // Include the HTML template for the list of contacts
        include 'view/contacts/list.php';
    }

    public function create()
    {
        include 'view/contacts/create.php';
    }

    public function add()
    {
        include 'view/contacts/create.php';
        $contactModel = new ContactModel();
        if (isset($_POST['create'])) {
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $contactModel->createModel($firstName, $lastName, $email, $phone, $address);
            header('location:create');
        }
    }
}
