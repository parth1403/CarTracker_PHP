<?php

class ReportsController extends Controller{

    public function byMake($f3, $params){
        $obj = new Report($this->db);
        echo json_encode($obj->byMake());
    }

    public function byMonth($f3, $params){
        $obj = new Report($this->db);
        echo json_encode($obj->byMonth());
    }
}