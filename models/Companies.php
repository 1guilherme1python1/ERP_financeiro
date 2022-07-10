<?php

class Companies extends Model{

    private $companyInfo = [];

    public function setCompany($id){
        $sql = $this->db->prepare("SELECT * FROM companies WHERE id=:id");
        $sql->bindValue(':id', $id);
        $sql->execute();

        if($sql->rowCount()>0){
            $data = $sql->fetch(PDO::FETCH_ASSOC);
            $this->companyInfo = $data[0];
        }
    }

    public function getName(){
        if(isset($this->companyInfo['name'])){
            return $this->companyInfo['name'];
        } else {
            return 0;
        }
    }
}