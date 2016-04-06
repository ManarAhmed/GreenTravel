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

	function hotelDetails($id){
		return $this->find($id)->toArray()[0];
	}

	function hotelAdd($hotelData){
		//2a3mel row gded
		$row = $this->createRow();
		$row->name = $hotelData['name'];
		$row->city_id = $hotelData['city_id'];

		//save in DB
		$row->save();
	}

	function hotelEdit($hotelData){
		//a3ml array gdeda bel data bas mn 8er el btns
		$customData['name'] = $hotelData['name'];
		$customData['city_id'] = $hotelData['city_id'];

		$id = $hotelData['id'];

		$this->update($customData,"id= $id");
	}
}

