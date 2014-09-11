<?php

class StaffController extends Controller{
 
    public function getAll(){
        $obj = new Staff($this->db);
        echo json_encode($obj->all());
    }
    
    public function create(){
        $obj = new Staff($this->db);
        echo json_encode($obj->add($this->f3->get("POST.postdata")));
    }
    
    public function delete($f3, $params){
        $obj = new Staff($this->db);
        echo json_encode($obj->delete($params["ColorID"]));
    }
    
    public function update($f3, $params){
        $obj = new Staff($this->db);
        echo json_encode($obj->edit($params["ColorID"], $this->f3->get("POST.postdata")));
    }
}