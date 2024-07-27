<?php

class Slide extends Controller {
    public function dekanat() {
        $data['pimpinan'] = $this->model('pimpinan_model')->getDataByRole(1);
        $data['schedule'] = $this->model('Kegiatan_model')->getDataTodayByRole(1);

        $this->view('schedule/index', $data);
    }
}