<?php

class ContactController
{
    public function index()
    {
        // Create an instance of the ContactModel
        $contactModel = new ContactModel();
        if (isset($_GET['button_search'])) {
            $content = $_GET['content'];
            $contacts = $contactModel->searchModel($content);
        } else {
            $contacts = $contactModel->getContacts();
        }
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
        $result = $contactModel->createModel($firstName, $lastName, $email, $phone, $address);
        if ($result == null) {
            $_SESSION['success_message'] = 'Account successfully created';
            header('location:index');
        } else {
            $_SESSION['err_message'] = 'Account creation failed';
            header('location:create');
        }
    }

    public function edit()
    {
        $contactModel = new ContactModel();
        $id = $_GET['id'];
        $detail = $contactModel->getContactById($id);
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
        $result = $contactModel->updateModel($contactId, $first_name, $last_name, $email, $phone, $address);
        if ($result == null) {
            $_SESSION['edit_message'] = 'Updated data successfully';
            $url = "view?id=" .  $contactId;
            header("location: $url");
        } else {
            $url = "edit?id=" .  $contactId;
            header("location: $url");
        }
    }

    public function view()
    {
        $contactModel = new ContactModel();
        $id = $_GET['id'];
        $detail = $contactModel->getContactById($id);
        include 'view/contacts/detail.php';
    }

    public function delete()
    {
        $contactModel = new ContactModel();
        $id = $_POST['id'];
        $result = $contactModel->deleteById($id);
        if ($result == true) {
            $_SESSION['delete_message'] = 'Deleted data successfully ';
        }
        header('location:index');
    }
}
