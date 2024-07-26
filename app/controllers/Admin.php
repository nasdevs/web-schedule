<?php

class Admin extends Controller {
    public function index() {
        $data['dosen'] = $this->model('Dosen_model')->getAllData();
        $data['schedule'] = $this->model('Kegiatan_model')->getDataToday();

        $this->view('admin/index', $data);
    }

    public function cs($id_dosen) {
        $this->model('Dosen_model')->changeStatus($id_dosen); 
        header('Location: ' . BASEURL . '/admin');
        exit;
    }
    
    public function as() {
        $result = $this->model('Kegiatan_model')->add($_POST);
        if ($result) 
            echo json_encode(['success' => true, 'message' => 'Data berhasil ditambahkan']);
    }

    public function ds() {
        $result = $this->model('Kegiatan_model')->delete($_POST['id']);
        if ($result) 
            echo json_encode(['success' => true, 'message' => 'Data berhasil ditambahkan']);
    }

    public function resetKehadiran() {
        $this->model('Dosen_model')->resetKehadiran();
        header('Location: ' . BASEURL . '/admin');
        exit;
    }

    public function getScheduleDosen() {
        echo json_encode($this->model('Kegiatan_model')->getDataTodayByIdDosen($_POST['id']));
    }

    public function add() {
        // Path lokal untuk menyimpan file yang diupload
        $target_dir = $_SERVER['DOCUMENT_ROOT'] . "/web-schedule/public/assets/foto_dosen/";
        $target_file = $target_dir . basename($_FILES["path_foto"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["path_foto"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["path_foto"]["size"] > 500000) {
            $uploadOk = 0;
        }

        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["path_foto"]["tmp_name"], $target_file)) {
                $_POST['path_foto'] = "/foto_dosen/" . basename($_FILES["path_foto"]["name"]);
                $this->model('Dosen_model')->add($_POST);
                header('Location: ' . BASEURL . '/admin');
                exit;
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
}
