<?php

class Category extends DB\SQL\Mapper {
 
    public function __construct(DB\SQL $db) {
        parent::__construct($db,'categories');
    }
 
    public function all() {
        return $this->db->exec('SELECT * FROM categories');
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
        $returndata->message = "Category added successfully";
        $returndata->success = true;
        $returndata->data = array(
            'CategoryID'=>$insertData->_id,
            'LongName'=>$LongName,
            'ShortName'=>$ShortName,
            'CreatedDate'=>$CreatedDate,
            'Active'=>$Active
        );
        return $returndata;
    }
 
    public function getById($id) {
        $this->load(array('CategoryID=?',$id));
        $this->copyTo('POST');
    }
 
    public function edit($id, $putdata) {
        $data = json_decode($putdata);
        $LongName = $data->LongName;
        $ShortName = $data->ShortName;
        $Active = $data->Active == true ? 1 : 0;
        
        $this->reset();
        $this->load(array('CategoryID=?',$id));
        $this->LongName = $LongName;
        $this->ShortName = $ShortName;
        $this->Active = $Active;
        $this->update();
        
        $this->LongName = null;
        $this->ShortName = null;
        $this->CreatedDate = null;
        $this->Active = null;
        
        $returndata = new stdClass();
        $returndata->message = "Category updated successfully";
        $returndata->success = true;
        $returndata->data = array(
            'CategoryID'=>$id,
            'LongName'=>$LongName,
            'ShortName'=>$ShortName,
            'Active'=>$Active
        );
        return $returndata;
    }
 
    public function delete($id) {
        $this->load(array('CategoryID=?',$id));
        $this->erase();
        
        $returndata = new stdClass();
        $returndata->message = "Category deleted successfully";
        $returndata->success = true;
        $returndata->data = array(
            'CategoryID'=>$id
        );
        return $returndata;
    }
}