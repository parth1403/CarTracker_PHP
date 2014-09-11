<?php

class Car extends DB\SQL\Mapper {
 
    public function __construct(DB\SQL $db) {
        parent::__construct($db,'cars');
    }
 
    public function all() {
        return $this->db->exec('select 
                    c.*, 
                    group_concat(distinct f.FeatureID order by f.FeatureID ASC separator ";") as Features,
                    group_concat(distinct f.LongName order by f.FeatureID ASC separator ";") as _Features,
                    group_concat(distinct s.StaffID order by s.StaffID asc separator ";") as SalesPeople,
                    group_concat(distinct s.LastName order by s.StaffID asc separator ";") as _SalesPeople,
                    st.LongName as _Status,
                    mk.LongName as _Make,
                    md.LongName as _Model,
                    ct.LongName as _Category,
                    clr.LongName as _Color
            from 
                    cars c,
                    carfeatures cf,
                    features f,
                    carstaff cs,
                    staff s,
                    statuses st,
                    makes mk,
                    models md,
                    categories ct,
                    colors clr
            where 
                    c.CarID = cf.CarID and 
                    c.CarID = cs.CarID and 
                    cf.FeatureID = f.FeatureID and 
                    cs.StaffID = s.StaffID and
                    c.StatusID = st.StatusID and
                    mk.MakeID = c.MakeID and
                    md.ModelID = c.ModelID and
                    ct.CategoryID = c.CategoryID and
                    clr.ColorID = c.ColorID
            group by c.CarID;');
    }
 
    public function add($postdata) {
        $data = json_decode($postdata);
        $Description = $data->Description;
        $Year = $data->Year;
        $ListPrice = $data->ListPrice;
        $SalePrice = $data->SalePrice;
        $AcquisitionDate = $data->AcquisitionDate;
        $SaleDate = $data->SaleDate;
        $IsSold = $data->IsSold;
        $StatusID = $data->StatusID;
        $MakeID = $data->MakeID;
        $ModelID = $data->ModelID;
        $CategoryID = $data->CategoryID;
        $ColorID = $data->ColorID;
        $FeaturesID = $data->FeaturesID;
        $SalesPeople = $data->SalesPeople;
        $CreatedDate = date("Y-m-d H:i:s");
        $Active = $data->Active == true ? 1 : 0;
        
        $this->Description = $Description;
        $this->Year = $Year;
        $this->ListPrice = $ListPrice;
        $this->SalePrice = $SalePrice;
        $this->AcquisitionDate = $AcquisitionDate;
        $this->SaleDate = $SaleDate;
        $this->IsSold = $IsSold;
        $this->StatusID = $StatusID;
        $this->MakeID = $MakeID;
        $this->ModelID = $ModelID;
        $this->CategoryID = $CategoryID;
        $this->ColorID = $ColorID;
        $this->FeaturesID = $FeaturesID;
        $this->SalesPeople = $SalesPeople;
        $this->CreatedDate = $CreatedDate;
        $this->Active = $Active;
        $insertData = $this->save();
        
        $this->Description = null;
        $this->Year = null;
        $this->ListPrice = null;
        $this->SalePrice = null;
        $this->AcquisitionDate = null;
        $this->SaleDate = null;
        $this->IsSold = null;
        $this->StatusID = null;
        $this->MakeID = null;
        $this->ModelID = null;
        $this->CategoryID = null;
        $this->ColorID = null;
        $this->FeaturesID = null;
        $this->SalesPeople = null;
        $this->CreatedDate = null;
        $this->Active = null;
       
        $returndata = new stdClass();
        $returndata->message = "Car added successfully";
        $returndata->success = true;
        $returndata->data = array(
            'CarID'=>$insertData->_id,
            'CreatedDate'=>$CreatedDate
        );
        return $returndata;
    }
 
    public function getById($id) {
        $this->load(array('CarID=?',$id));
        $this->copyTo('POST');
    }
 
    public function edit($id, $putdata) {
        $data = json_decode($postdata);
        $Description = $data->Description;
        $Year = $data->Year;
        $ListPrice = $data->ListPrice;
        $SalePrice = $data->SalePrice;
        $AcquisitionDate = $data->AcquisitionDate;
        $SaleDate = $data->SaleDate;
        $IsSold = $data->IsSold;
        $StatusID = $data->StatusID;
        $MakeID = $data->MakeID;
        $ModelID = $data->ModelID;
        $CategoryID = $data->CategoryID;
        $ColorID = $data->ColorID;
        $FeaturesID = $data->FeaturesID;
        $SalesPeople = $data->SalesPeople;
        $CreatedDate = date("Y-m-d H:i:s");
        $Active = $data->Active == true ? 1 : 0;
        
        $this->reset();
        $this->load(array('CarID=?',$id));
        $this->Description = $Description;
        $this->Year = $Year;
        $this->ListPrice = $ListPrice;
        $this->SalePrice = $SalePrice;
        $this->AcquisitionDate = $AcquisitionDate;
        $this->SaleDate = $SaleDate;
        $this->IsSold = $IsSold;
        $this->StatusID = $StatusID;
        $this->MakeID = $MakeID;
        $this->ModelID = $ModelID;
        $this->CategoryID = $CategoryID;
        $this->ColorID = $ColorID;
        $this->FeaturesID = $FeaturesID;
        $this->SalesPeople = $SalesPeople;
        $this->CreatedDate = $CreatedDate;
        $this->Active = $Active;
        $this->update();
        
        $this->Description = null;
        $this->Year = null;
        $this->ListPrice = null;
        $this->SalePrice = null;
        $this->AcquisitionDate = null;
        $this->SaleDate = null;
        $this->IsSold = null;
        $this->StatusID = null;
        $this->MakeID = null;
        $this->ModelID = null;
        $this->CategoryID = null;
        $this->ColorID = null;
        $this->FeaturesID = null;
        $this->SalesPeople = null;
        $this->CreatedDate = null;
        $this->Active = null;
        
        $returndata = new stdClass();
        $returndata->message = "Car updated successfully";
        $returndata->success = true;
        $returndata->data = array(
            'CarID'=>$id,
        );
        return $returndata;
    }
 
    public function delete($id) {
        $this->load(array('CarID=?',$id));
        $this->erase();
        
        $returndata = new stdClass();
        $returndata->message = "Car deleted successfully";
        $returndata->success = true;
        $returndata->data = array(
            'CarID'=>$id
        );
        return $returndata;
    }
}