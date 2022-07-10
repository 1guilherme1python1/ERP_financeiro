<?php

class LoginController extends Controller{
    public function index(){
        $data = array();
        if(isset($_POST['email']) && !empty($_POST['email'])){
            $email_input = $_POST['email'];
            $password = $_POST['password'];
            
            $email = filter_var($email_input, FILTER_VALIDATE_EMAIL, FILTER_SANITIZE_EMAIL);
            
            $users = new Users();

            if($users->ToDoLogin($email, $password)){
                header("Location: ".BASE_URL);
            } else {
                $data['error'] = "Email ou senha não conferem!";
            }
        }

        $this->loadView('login', $data);
    }
    public function logout(){
        unset($_SESSION['lgaluno']);
        header("Location: ".BASE_URL);
    }
}