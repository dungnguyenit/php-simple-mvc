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

    public function isPhoneExists($phone)
    {
        $sql = "SELECT COUNT(*) AS count FROM contacts WHERE phone = '$phone'";
        $result = $this->db->query($sql);
        $row = $result->fetch_assoc();
        return $row['count'] > 0;
    }


    public function createModel($firstName, $lastName, $email, $phone, $address)
    {
        $phoneExists = $this->isPhoneExists($phone);
        if ($phoneExists) {
            return "Phone number already exists. Cannot create duplicate phone numbers.";
        }

        if (empty($email) || empty($phone)) {
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


    public function updateModel($contactId, $first_name, $last_name, $email, $phone, $address)
    {
        if (empty($email) || empty($phone)) {
            return "Email and phone are required.";
        }

        if ($email === '' || $phone === '') {
            return "Email and phone cannot be empty.";
        }

        $sql_update = "UPDATE contacts SET id='$contactId', first_name = '$first_name', last_name ='$last_name', email =' $email', phone = '$phone', address = '$address' WHERE id = $contactId";
        mysqli_query($this->db, $sql_update);
    }

    public function getContactById($id)
    {
        $sql = "SELECT * FROM contacts WHERE id = $id Limit 1";
        $result = $this->db->query($sql);
        $contacts = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $contacts[] = $row;
            }
        }

        if (count($contacts) > 0) {
            return $contacts[0];
        }
        return null;
    }

    public function deleteById($id)
    {
        $sql = "DELETE FROM contacts WHERE id = $id";
        $result = $this->db->query($sql);
        return true;
    }

    public function searchModel($content)
    {
        $sql_search = "SELECT * FROM contacts WHERE phone LIKE '%$content%' OR first_name LIKE '%$content%'";
        $result = $this->db->query($sql_search);
        $contacts = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $contacts[] = $row;
            }
        }
        return $contacts;
    }
}
