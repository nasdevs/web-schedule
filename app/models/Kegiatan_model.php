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

    public function getDataByIdDosen($id_dosen) {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE id_dosen = :id_dosen';

        $this->db->query($query);
        $this->db->bind('id_dosen', $id_dosen);

        return $this->db->resultSet();
    }

    public function getDataTodayByIdDosen($id_dosen) {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE id_dosen = :id_dosen AND DATE(created_at) = CURDATE()';

        $this->db->query($query);
        $this->db->bind('id_dosen', $id_dosen);

        return $this->db->resultSet();
    }

    public function getDataToday() {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE DATE(created_at) = CURDATE()');
        return $this->db->resultSet();
    }

    public function add($data) {
        $query = 'INSERT INTO ' . $this->table . ' (id_dosen, kegiatan, waktu_start, waktu_end, created_at) 
                  VALUES (:id_dosen, :kegiatan, :waktu_start, :waktu_end, NOW())';

        $this->db->query($query);
        $this->db->bind('id_dosen', $data['id_dosen']);
        $this->db->bind('kegiatan', $data['kegiatan']);
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

    public function deleteByIdDosen($id_dosen) {
        $query = 'DELETE FROM ' . $this->table . ' WHERE id_dosen = :id_dosen';

        $this->db->query($query);
        $this->db->bind('id_dosen', $id_dosen);

        return $this->db->execute();
    }
}