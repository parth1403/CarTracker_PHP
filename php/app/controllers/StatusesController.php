<?php

class StatusesController extends Controller{
 
    public function getAll(){
        $obj = new Status($this->db);
        echo json_encode($obj->all());
    }
    
    public function create(){
        $obj = new Status($this->db);
        echo json_encode($obj->add($this->f3->get("POST.postdata")));
    }
    
    public function delete($f3, $params){
        $obj = new Status($this->db);
        echo json_encode($obj->delete($params["StatusID"]));
    }
    
    public function update($f3, $params){
        $obj = new Status($this->db);
        echo json_encode($obj->edit($params["StatusID"], $this->f3->get("POST.postdata")));
    }
}