<?php

class Application_Model_Location extends Zend_DB_Table_Abstract
{
	protected $_name = "location";

	function listLocations($cid){
		//returns all Locations from db
		return $this->fetchAll("city_id=$cid",null,null)->toArray();
	}

	function locationDelete($id)
	{
		$this->delete("id=$id");
	}

	function locationDetails($id){
		return $this->find($id)->toArray()[0];
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

	function locationEdit($locationData){
		//a3ml array gdeda bel data bas mn 8er el btns
		$customData['name'] = $locationData['name'];
		$customData['description'] = $locationData['description'];
		$customData['city_id'] = $locationData['city_id'];

		$id = $locationData['id'];

		$this->update($customData,"id= $id");
	}
}

