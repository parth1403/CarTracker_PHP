<?php

class Position extends DB\SQL\Mapper {
 
    public function __construct(DB\SQL $db) {
        parent::__construct($db,'positions');
    }
 
    public function all() {
        return $this->db->exec('SELECT * FROM positions');
    }
 
    public function add($postdata) {
        $data = json_decode($postdata);
        $LongName = $data->LongName;
        $ShortName = $data->ShortName;
        $CreatedDate = date("Y-m-d H:i:s");
        $Active = $data->Active == true ? 1 : 0;
        
        $this->LongName = $LongName;
        $this->ShortName = $ShortName;
        $this->CreatedDate = $CreatedDate;
        $this->Active = $Active;
        $insertData = $this->save();
        
        $this->LongName = null;
        $this->ShortName = null;
        $this->CreatedDate = null;
        $this->Active = null;
       
        $returndata = new stdClass();
        $returndata->message = "Position added successfully";
        $returndata->success = true;
        $returndata->data = array(
            'PositionID'=>$insertData->_id,
            'LongName'=>$LongName,
            'ShortName'=>$ShortName,
            'CreatedDate'=>$CreatedDate,
            'Active'=>$Active
        );
        return $returndata;
    }
 
    public function getById($id) {
        $this->load(array('PositionID=?',$id));
        $data = new stdClass();
        $data->PositionID = $this->PositionID;
        $data->LongName = $this->LongName;
        $data->ShortName = $this->ShortName;
        $data->CreatedDate = $this->CreatedDate;
        $data->Active = $this->Active;
        return $data;
    }
 
    public function edit($id, $putdata) {
        $data = json_decode($putdata);
        $LongName = $data->LongName;
        $ShortName = $data->ShortName;
        $Active = $data->Active == true ? 1 : 0;
        
        $this->reset();
        $this->load(array('PositionID=?',$id));
        $this->LongName = $LongName;
        $this->ShortName = $ShortName;
        $this->Active = $Active;
        $this->update();
        
        $this->LongName = null;
        $this->ShortName = null;
        $this->CreatedDate = null;
        $this->Active = null;
        
        $returndata = new stdClass();
        $returndata->message = "Position updated successfully";
        $returndata->success = true;
        $returndata->data = array(
            'PositionID'=>$id,
            'LongName'=>$LongName,
            'ShortName'=>$ShortName,
            'Active'=>$Active
        );
        return $returndata;
    }
 
    public function delete($id) {
        $this->load(array('PositionID=?',$id));
        $this->erase();
        
        $returndata = new stdClass();
        $returndata->message = "Position deleted successfully";
        $returndata->success = true;
        $returndata->data = array(
            'PositionID'=>$id
        );
        return $returndata;
    }
}