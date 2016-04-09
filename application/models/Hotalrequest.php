<?php

class Application_Model_Hotalrequest extends Zend_Db_Table_Abstract
{
    protected $_name = 'hotelreserve';
  function hotalinfo($id)

	{
      //var_dump($id);exit();

        $result = $this->fetchRow($this->select()->from('hotelreserve')->where('user_id = ?', $id));
	 	//var_dump($result);exit();
	 	
	   return $result;
    }   

//add hotel reservation request  
function addHotelRes($hotel_data,$uid){
        $row = $this->createRow();
        $row->hotel_id = $hotel_data['name'];
        $row->user_id = $uid;
        $row->number = $hotel_data['number'];
        $row->date_from = $hotel_data['from'];
        $row->date_to = $hotel_data['to'];
        $row->city_id = $hotel_data['id'];
        $row->save();   
    }


}

