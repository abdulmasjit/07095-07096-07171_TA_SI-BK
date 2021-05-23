<?php 
class AuthController extends Controller{
    
    public function __construct()
    {
        $this->authModel = $this->model('AuthModel');
    }   

    public function index()
    {
        $data['title'] = 'Login';
        $this->view('auth/index', $data);
    }

    public function login()
    {   
        $username = $_POST['username'];
        $password = $_POST['password'];
        $data = $this->authModel->checkAuth($username, $password);
        if($data){
            $_SESSION['role'] = data['role'];
            $_SESSION['user'] = $data;
            header('location:'. SITE_URL .'/home');
        }else{
            Flasher::setFlash('Login gagal username atau password salah', 'Maaf!', 'danger');
            header('location:'. SITE_URL .'/');
        }
    }

    public function logout()
    { 
        session_destroy();
        header('location:'. SITE_URL .'/');
    }
}