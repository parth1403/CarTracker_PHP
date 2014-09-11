<?php

class CategoriesController extends Controller{
 
    public function getAll(){
        $obj = new Category($this->db);
        echo json_encode($obj->all());
    }
    
    public function create(){
        $obj = new Category($this->db);
        echo json_encode($obj->add($this->f3->get("POST.postdata")));
    }
    
    public function delete($f3, $params){
        $obj = new Category($this->db);
        echo json_encode($obj->delete($params["CategoryID"]));
    }
    
    public function update($f3, $params){
        $obj = new Category($this->db);
        echo json_encode($obj->edit($params["CategoryID"], $this->f3->get("POST.postdata")));
    }
}