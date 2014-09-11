<?php

class DriveTrainsController extends Controller{
 
    public function getAll(){
        $obj = new DriveTrain($this->db);
        echo json_encode($obj->all());
    }
    
    public function create(){
        $obj = new DriveTrain($this->db);
        echo json_encode($obj->add($this->f3->get("POST.postdata")));
    }
    
    public function delete($f3, $params){
        $obj = new DriveTrain($this->db);
        echo json_encode($obj->delete($params["DriveTrainID"]));
    }
    
    public function update($f3, $params){
        $obj = new DriveTrain($this->db);
        echo json_encode($obj->edit($params["DriveTrainID"], $this->f3->get("POST.postdata")));
    }
}