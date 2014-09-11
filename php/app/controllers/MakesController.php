<?php

class MakesController extends Controller{
 
    public function getAll(){
        $obj = new Make($this->db);
        echo json_encode($obj->all());
    }
    
    public function create(){
        $obj = new Make($this->db);
        echo json_encode($obj->add($this->f3->get("POST.postdata")));
    }
    
    public function delete($f3, $params){
        $obj = new Make($this->db);
        echo json_encode($obj->delete($params["MakeID"]));
    }
    
    public function update($f3, $params){
        $obj = new Make($this->db);
        echo json_encode($obj->edit($params["MakeID"], $this->f3->get("POST.postdata")));
    }
}