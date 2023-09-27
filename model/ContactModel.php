<?php
class ContactModel
{
    private $db;

    public function __construct()
    {
        $db = new Database();
        $this->db = $db->getConnect();
    }

    public function getContacts()
    {
        $sql = "SELECT * FROM contacts";
        $result = $this->db->query($sql);
        $contacts = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $contacts[] = $row;
            }
        }
        return $contacts;
    }
    public function createModel($firstName, $lastName, $email, $phone, $address)
    {

        if (empty($firstName) || empty($lastName) || empty($email) || empty($phone) || empty($address)) {
            return "All fields are required.";
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "Invalid email format.";
        }
        if (!is_numeric($phone)) {
            return "Invalid phone number.";
        }
        $query = "INSERT INTO contacts (first_name, last_name, email, phone, address) VALUES ('$firstName', '$lastName', '$email', '$phone', '$address')";

        $result = $this->db->query($query);
    }
}
