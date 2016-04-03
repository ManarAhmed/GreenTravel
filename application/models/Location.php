<?php

class Application_Model_Location extends Zend_DB_Table_Abstract
{
	protected $_name = "location";

	function listLocations(){
		//returns all Locations from db
		return $this->fetchAll(null,"name ASC")->toArray();
	}

	function locationDelete($id)
	{
		$this->delete("id=$id");
	}


	function locationAdd($locData){
		//2a3mel row gded
		$row = $this->createRow();
		$row->name = $locData['name'];
		$row->description = $locData['description'];
		$row->city_id = $locData['city_id'];

		//save in DB
		$row->save();
	}
}

