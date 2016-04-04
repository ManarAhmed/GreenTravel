<?php

class Application_Model_Hotel extends Zend_DB_Table_Abstract
{
	protected $_name = "hotel";

	function listHotels(){
		//returns all hotels from db
		return $this->fetchAll(null,"name ASC")->toArray();
	}
	
	function hotelDelete($id)
	{
		$this->delete("id=$id");
	}
	function getHotelByName($name) {
        return $this->fetchAll("name='".$name."'")->toArray();
    }
}

