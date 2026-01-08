<?php
class AuthController extends Controller {
    public function index() {
        $this->view('auth/login');
    }

    public function login() {
        $user = $this->model('UserModel')->getUser($_POST['username']);
        if($user && $user['password'] == $_POST['password']) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role'] = $user['role'];
            header('Location: ' . BASEURL . '/item');
        } else {
            echo "<script>alert('Login Gagal'); window.location='".BASEURL."'</script>";
        }
    }

    public function logout() {
        session_destroy();
        header('Location: ' . BASEURL);
    }
}