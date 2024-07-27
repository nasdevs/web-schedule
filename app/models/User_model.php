<?php

class User_model {
    private $table = 'user';
    private $db;

    function __construct() {
        $this->db = new Database();
    }

    public function validateLogin($email, $password) {
        $query = 'SELECT id_user, id_role FROM ' . $this->table . ' WHERE username = :username and password = password(:password)';

        $this->db->query($query);
        $this->db->bind('username', $email);
        $this->db->bind('password', $password);

        $result = $this->db->single();
        $data = array(
            "id_user" => $result['id_user'],
            "id_role" => $result['id_role']
        );

        if ($data) {
            return $data;
        }
        else {
            return false;
        }
    }

}