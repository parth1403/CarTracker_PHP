<?php

class PositionsController extends Controller{
 
    public function getAll(){
        $obj = new Position($this->db);
        echo json_encode($obj->all());
    }
    
    public function create(){
        $obj = new Position($this->db);
        echo json_encode($obj->add($this->f3->get("POST.postdata")));
    }
    
    public function delete($f3, $params){
        $obj = new Position($this->db);
        echo json_encode($obj->delete($params["PositionID"]));
    }
    
    public function update($f3, $params){
        $obj = new Position($this->db);
        echo json_encode($obj->edit($params["PositionID"], $this->f3->get("POST.postdata")));
    }
}