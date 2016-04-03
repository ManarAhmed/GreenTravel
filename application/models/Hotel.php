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

	function hotelAdd($hotelData){
		//2a3mel row gded
		$row = $this->createRow();
		$row->name = $hotelData['name'];
		$row->city_id = $hotelData['city_id'];

		//save in DB
		$row->save();
	}
}

