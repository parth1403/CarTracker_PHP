<?php

class CarsController extends Controller{
 
    public function getAll(){
        $obj = new Car($this->db);
        echo json_encode($obj->all());
    }
    
    public function create(){
        $obj = new Car($this->db);
        echo json_encode($obj->add($this->f3->get("POST.postdata")));
    }
    
    public function delete($f3, $params){
        $obj = new Car($this->db);
        echo json_encode($obj->delete($params["CarID"]));
    }
    
    public function update($f3, $params){
        $obj = new Car($this->db);
        echo json_encode($obj->edit($params["CarID"], $this->f3->get("POST.postdata")));
    }
}