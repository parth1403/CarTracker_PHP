<?php

class Staff extends DB\SQL\Mapper {
 
    public function __construct(DB\SQL $db) {
        parent::__construct($db,'staff');
    }
 
    public function all() {
        return $this->db->exec('select s.*,p.LongName as _Position from staff s, positions p where s.PositionID = p.PositionID');
    }
 
    public function add($postdata) {
        $data = json_decode($postdata);
        $FirstName = $data->FirstName;
        $LastName = $data->LastName;
        $DOB = $data->DOB;
        $Address1 = $data->Address1;
        $Address2 = $data->Address2;
        $City = $data->City;
        $State = $data->State;
        $PostalCode = $data->PostalCode;
        $Phone = $data->Phone;
        $HireDate = $data->HireDate;
        $PositionID = $data->PositionID;
        $CreatedDate = date("Y-m-d H:i:s");
        $Active = $data->Active == true ? 1 : 0;
        
        $this->FirstName = $FirstName;
        $this->LastName = $LastName;
        $this->DOB = $DOB;
        $this->Address1 = $Address1;
        $this->Address2 = $Address2;
        $this->City = $City;
        $this->State = $State;
        $this->PostalCode = $PostalCode;
        $this->Phone = $Phone;
        $this->HireDate = $HireDate;
        $this->PositionID = $PositionID;
        $this->CreatedDate = $CreatedDate;
        $this->Active = $Active;
        $insertData = $this->save();
        
        $this->FirstName = null;
        $this->LastName = null;
        $this->DOB = null;
        $this->Address1 = null;
        $this->Address2 = null;
        $this->City = null;
        $this->State = null;
        $this->PostalCode = null;
        $this->Phone = null;
        $this->HireDate = null;
        $this->PositionID = null;
        $this->CreatedDate = null;
        $this->Active = null;
       
        $returndata = new stdClass();
        $returndata->message = "Staff added successfully";
        $returndata->success = true;
        $obj = new Position($this->db);
        $Position = $obj->getById($PositionID)->LongName;
        $returndata->data = array(
            'StaffID'=>$insertData->_id,
            'CreatedDate'=>$CreatedDate,
            '_Position'=>$Position
        );
        return $returndata;
    }
 
    public function getById($id) {
        $this->load(array('StaffID=?',$id));
        $this->copyTo('POST');
    }
 
    public function edit($id, $postdata) {
        $data = json_decode($postdata);
        $FirstName = $data->FirstName;
        $LastName = $data->LastName;
        $DOB = $data->DOB;
        $Address1 = $data->Address1;
        $Address2 = $data->Address2;
        $City = $data->City;
        $State = $data->State;
        $PostalCode = $data->PostalCode;
        $Phone = $data->Phone;
        $HireDate = $data->HireDate;
        $PositionID = $data->PositionID;
        $CreatedDate = date("Y-m-d H:i:s");
        $Active = $data->Active == true ? 1 : 0;
        
        $this->reset();
        $this->load(array('StaffID=?',$id));
        $this->FirstName = $FirstName;
        $this->LastName = $LastName;
        $this->DOB = $DOB;
        $this->Address1 = $Address1;
        $this->Address2 = $Address2;
        $this->City = $City;
        $this->State = $State;
        $this->PostalCode = $PostalCode;
        $this->Phone = $Phone;
        $this->HireDate = $HireDate;
        $this->PositionID = $PositionID;
        $this->CreatedDate = $CreatedDate;
        $this->Active = $Active;
        $this->update();
        
        $this->FirstName = null;
        $this->LastName = null;
        $this->DOB = null;
        $this->Address1 = null;
        $this->Address2 = null;
        $this->City = null;
        $this->State = null;
        $this->PostalCode = null;
        $this->Phone = null;
        $this->HireDate = null;
        $this->PositionID = null;
        $this->CreatedDate = null;
        $this->Active = null;
        
        $returndata = new stdClass();
        $returndata->message = "Staff updated successfully";
        $returndata->success = true;
        $returndata->data = array(
            'StaffID'=>$id
        );
        return $returndata;
    }
 
    public function delete($id) {
        $this->load(array('StaffID=?',$id));
        $this->erase();
        
        $returndata = new stdClass();
        $returndata->message = "Staff deleted successfully";
        $returndata->success = true;
        $returndata->data = array(
            'StaffID'=>$id
        );
        return $returndata;
    }
}