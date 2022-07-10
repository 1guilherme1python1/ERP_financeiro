<?php
class Users extends Model{
    private $userInfo = []; 

    public function isLogged(){
        if(isset($_SESSION['userLogin']) && !empty($_SESSION['userLogin'])){
            return true;
        } else {
            return false;
        }
    }
    public function ToDoLogin($email, $password){
        $sql = $this->db->prepare("SELECT * FROM users WHERE email=:email");
        $sql->bindValue(':email', $email);
        $sql->execute();

        if($sql->rowCount()>0){
            $data = $sql->fetchAll(PDO::FETCH_ASSOC);
            $this->userInfo = $data[0];

           if(password_verify($password, $this->userInfo['password'])){
            $_SESSION['userLogin'] = md5(time().rand(0, 99999));
            $_SESSION['id_user'] = $this->userInfo['id'];
            return true;
        }  }

        return false;
    }

    public function getCompany(){
        if(isset($this->userInfo['id_company'])){
        return $this->userInfo['id_company'];
        } else {
            return 0;
        }
    }
}