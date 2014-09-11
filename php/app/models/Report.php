<?php

class Report extends DB\SQL\Mapper {
 
    public function __construct(DB\SQL $db) {
        parent::__construct($db,'cars');
    }

    public function byMake(){
        return $this->db->exec('SELECT c.MakeID,mk.ShortName as Make,c.ModelID,md.ShortName as Model, sum(SalePrice) as TotalSales from cars c,makes mk, models md where c.MakeID = mk.MakeID and c.ModelID = md.ModelID group by ModelID');
    }

    public function byMonth(){
        return $this->db->exec('SELECT count(c.CarID) as TotalSold, sum(c.SaleDate) as TotalSales,  monthname(c.SaleDate) as Month from cars c group by month(c.SaleDate);');
    }
}