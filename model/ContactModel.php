<?php
class ContactModel {
    private $db;

    public function __construct() {
        $db = new Database();
        $this->db = $db->getConnect();
    }

    public function getContacts() {
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
}
