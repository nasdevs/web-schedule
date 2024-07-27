<?php

class Pimpinan_model {
    private $table = 'pimpinan';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getAllData() {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getDataByRole($role) {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_role = :id_role');
        $this->db->bind('id_role', $role);

        return $this->db->resultSet();
    }

    public function changeStatus($id_pimpinan) {
        $query = 'UPDATE ' . $this->table . ' SET kehadiran = IF(kehadiran = 0, 1, 0) WHERE id_pimpinan = :id_pimpinan';
        $this->db->query($query);
        $this->db->bind('id_pimpinan', $id_pimpinan);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function resetKehadiran() {
        $query = 'UPDATE ' . $this->table . ' SET kehadiran = 0';
        $this->db->query($query);
        $this->db->execute();
        
        return $this->db->rowCount();
    }

    public function add($data) {
        $query = 'INSERT INTO ' . $this->table . ' (nip, nama, jabatan, path_foto, created_at) VALUES (:nip, :nama, :jabatan, :path_foto, NOW())';
        $this->db->query($query);
        $this->db->bind('nip', $data['nip']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('jabatan', $data['jabatan']);
        $this->db->bind('path_foto', $data['path_foto']);
        
        return $this->db->execute();
    }
}
