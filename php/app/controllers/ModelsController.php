<?php

class ModelsController extends Controller{
 
    public function getAll(){
        $obj = new Model($this->db);
        echo json_encode($obj->all());
    }
    
    public function create(){
        $obj = new Model($this->db);
        echo json_encode($obj->add($this->f3->get("POST.postdata")));
    }
    
    public function delete($f3, $params){
        $obj = new Model($this->db);
        echo json_encode($obj->delete($params["ModelID"]));
    }
    
    public function update($f3, $params){
        $obj = new Model($this->db);
        echo json_encode($obj->edit($params["ModelID"], $this->f3->get("POST.postdata")));
    }
}