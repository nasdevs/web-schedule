<?php

class Role_model {
    private $table = 'role';
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getDataById($id_role) {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_role = :id_role');
        $this->db->bind('id_role', $id_role);
        return $this->db->single();
    }
}