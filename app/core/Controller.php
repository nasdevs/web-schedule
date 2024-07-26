<?php

class Controller {
    public function view($view, $data = []) {
        require_once "../app/views/$view.php";
    }

    public function model($model) {
        require_once "../app/models/$model.php";
        
        return new $model;
    }

    public function checkLoginSession() {
        if (!isset($_SESSION['id_user'])) {
            header('Location: ' . BASEURL . '/login');
            exit;
        }
    }

    public function checkRoleAndRedirect($allowedRole, $redirectPage) {
        if ($_SESSION['role_user'] != $allowedRole) {
            header('Location: ' . BASEURL . $redirectPage);
            exit;
        }
    }
}