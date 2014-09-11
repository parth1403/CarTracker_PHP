<?php

class Model extends DB\SQL\Mapper {
 
    public function __construct(DB\SQL $db) {
        parent::__construct($db,'models');
    }
 
    public function all() {
        return $this->db->exec('select md.*,mk.LongName as _Make from models md, makes mk where md.MakeID = mk.MakeID');
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
        $returndata->message = "Model added successfully";
        $returndata->success = true;
        $returndata->data = array(
            'ModelID'=>$insertData->_id,
            'LongName'=>$LongName,
            'ShortName'=>$ShortName,
            'CreatedDate'=>$CreatedDate,
            'Active'=>$Active
        );
        return $returndata;
    }
 
    public function getById($id) {
        $this->load(array('ModelID=?',$id));
        $this->copyTo('POST');
    }
 
    public function edit($id, $putdata) {
        $data = json_decode($putdata);
        $LongName = $data->LongName;
        $ShortName = $data->ShortName;
        $Active = $data->Active == true ? 1 : 0;
        
        $this->reset();
        $this->load(array('ModelID=?',$id));
        $this->LongName = $LongName;
        $this->ShortName = $ShortName;
        $this->Active = $Active;
        $this->update();
        
        $this->LongName = null;
        $this->ShortName = null;
        $this->CreatedDate = null;
        $this->Active = null;
        
        $returndata = new stdClass();
        $returndata->message = "Model updated successfully";
        $returndata->success = true;
        $returndata->data = array(
            'ModelID'=>$id,
            'LongName'=>$LongName,
            'ShortName'=>$ShortName,
            'Active'=>$Active
        );
        return $returndata;
    }
 
    public function delete($id) {
        $this->load(array('ModelID=?',$id));
        $this->erase();
        
        $returndata = new stdClass();
        $returndata->message = "Model deleted successfully";
        $returndata->success = true;
        $returndata->data = array(
            'ModelID'=>$id
        );
        return $returndata;
    }
}