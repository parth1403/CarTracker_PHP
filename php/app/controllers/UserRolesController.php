<?php

class UserRolesController extends Controller{
 
    public function getAll(){
        $obj = new UserRole($this->db);
        echo json_encode($obj->all());
    }
    
    public function create(){
        $obj = new UserRole($this->db);
        echo json_encode($obj->add($this->f3->get("POST.postdata")));
    }
    
    public function delete($f3, $params){
        $obj = new UserRole($this->db);
        echo json_encode($obj->delete($params["UserRoleID"]));
    }
    
    public function update($f3, $params){
        $obj = new UserRole($this->db);
        echo json_encode($obj->edit($params["UserRoleID"], $this->f3->get("POST.postdata")));
    }
}