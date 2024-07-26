<?php

class Schedule extends Controller {
    public function index() {
        $data['dosen'] = $this->model('Dosen_model')->getAllData();
        $data['schedule'] = $this->model('Kegiatan_model')->getDataToday();

        $this->view('schedule/index', $data);
    }
}