<?php
class HomeController extends Controller{
    public function __construct(){
        $alunos = new Users();

        if($alunos->isLogged() == false){
            header("Location: ".BASE_URL."login");
        }
    }

    public function index(){
        $data = [];

        $users = new Users();
        $company = new Companies();
        
        $id_company = $users->getCompany();
        $company->setCompany($id_company);

        $data['company_name'] = $company->getName();

        $this->loadTemplate('home', $data);
    }
    
}