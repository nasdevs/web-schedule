<?php

class Kegiatan_model {
    private $table = 'kegiatan';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getData() {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getDataByIdpimpinan($id_pimpinan) {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE id_pimpinan = :id_pimpinan';

        $this->db->query($query);
        $this->db->bind('id_pimpinan', $id_pimpinan);

        return $this->db->resultSet();
    }

    public function getDataTodayByIdpimpinan($id_pimpinan) {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE id_pimpinan = :id_pimpinan AND DATE(created_at) = CURDATE()';

        $this->db->query($query);
        $this->db->bind('id_pimpinan', $id_pimpinan);

        return $this->db->resultSet();
    }

    public function getDataTodayByRole($role) {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE DATE(created_at) = CURDATE() AND id_role = :id_role');
        $this->db->bind('id_role', $role);
        return $this->db->resultSet();
    }

    public function add($data) {
        $query = 'INSERT INTO ' . $this->table . ' (id_pimpinan, id_role, kegiatan, lokasi, waktu_start, waktu_end, created_at) 
                  VALUES (:id_pimpinan, :id_role, :kegiatan, :lokasi, :waktu_start, :waktu_end, NOW())';

        $this->db->query($query);
        $this->db->bind('id_pimpinan', $data['id_pimpinan']);
        $this->db->bind('id_role', $_SESSION['id_role']);
        $this->db->bind('kegiatan', $data['kegiatan']);
        $this->db->bind('lokasi', $data['lokasi']);
        $this->db->bind('waktu_start', $data['waktu_start']);
        $this->db->bind('waktu_end', $data['waktu_end']);

        return $this->db->execute();
        
    }

    public function delete($id_kegiatan) {
        $query = 'DELETE FROM ' . $this->table . ' WHERE id_kegiatan = :id_kegiatan';

        $this->db->query($query);
        $this->db->bind('id_kegiatan', $id_kegiatan);

        return $this->db->execute();
    }

    public function deleteByIdpimpinan($id_pimpinan) {
        $query = 'DELETE FROM ' . $this->table . ' WHERE id_pimpinan = :id_pimpinan';

        $this->db->query($query);
        $this->db->bind('id_pimpinan', $id_pimpinan);

        return $this->db->execute();
    }
}