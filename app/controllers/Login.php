<?php

class Login extends Controller {
    public function index() {
        // $this->checkLoginSession();

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (isset($_POST['username'])) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $username = $_POST['username'];
                $password = $_POST['password'];
                
                $result = $this->model('User_model')->validateLogin($username, $password);
                
                if ($result) {
                    $_SESSION['id_user'] = $result['id_user'];
                    $_SESSION['id_role'] = $result['id_role'];

                    $role_name = $this->model('Role_model')->getDataById($result['id_role'])['nama'];
                    $_SESSION['role_name'] = strtolower($role_name);
                    header('Location: ' . BASEURL . '/admin/' . strtolower($role_name));

                    exit;
                } else {
                    echo "Username atau Password salah";
                }
            }
        } else {
            $role_name = $this->model('Role_model')->getDataById($_SESSION['id_role'])['nama'];
            header('Location: ' . BASEURL . '/admin/' . strtolower($role_name));
            
            exit;
        }

        $this->view('login/index');
    }

    public function logout() {
        session_start();
        session_unset();
        session_destroy();

        header('Location: ' . BASEURL . '/login');
        exit;
    }

}