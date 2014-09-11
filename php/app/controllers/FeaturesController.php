<?php

class FeaturesController extends Controller{
 
    public function getAll(){
        $obj = new Feature($this->db);
        echo json_encode($obj->all());
    }
    
    public function create(){
        $obj = new Feature($this->db);
        echo json_encode($obj->add($this->f3->get("POST.postdata")));
    }
    
    public function delete($f3, $params){
        $obj = new Feature($this->db);
        echo json_encode($obj->delete($params["FeatureID"]));
    }
    
    public function update($f3, $params){
        $obj = new Feature($this->db);
        echo json_encode($obj->edit($params["FeatureID"], $this->f3->get("POST.postdata")));
    }
}