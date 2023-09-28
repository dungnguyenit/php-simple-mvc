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
        $contactModel = new ContactModel();
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $contactModel->createModel($firstName, $lastName, $email, $phone, $address);
        header('location:index');
    }

    public function edit()
    {
        $contactModel = new ContactModel();
        $id = $_GET['id'];
        $detail = $contactModel->getContactById($id);
        // var_dump($detail);die;
        include 'view/contacts/edit.php';
    }

    public function update()
    {
        $contactModel = new ContactModel();
        $contactId = $_POST['id'];
        $first_name = $_POST['firstName'];
        $last_name = $_POST['lastName'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $contactModel->updateModel($contactId, $first_name, $last_name, $email, $phone, $address);
        header('location:index');
    }

    public function view()
    {
        // var_dump('jjjjj');
        // die;
        $contactModel = new ContactModel();
        $id = $_GET['id'];
        $detail = $contactModel->getContactById($id);

        include 'view/contacts/detail.php';
    }

    public function delete()
    {
        $contactModel = new ContactModel();
        $id = $_POST['id'];
        $contactModel->deleteById($id);
        header('location:index');
    }
}
