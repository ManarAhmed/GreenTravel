<?php

class Application_Model_City extends Zend_DB_Table_Abstract
{
	protected $_name = "city";

	function rateCity() {
		return $this->fetchAll(null,"rate DESC",6)->toArray();
	}

	function listCities($id){
		return $this->fetchAll("country_id=$id","name")->toArray();
	}

	function citydetails($id){
		return $this->find($id)->toArray()[0];
	}

	function listAllCities(){		
		//returns all cities from db
		return $this->fetchAll(null,"name ASC")->toArray();
	}

	function cityDelete($id)
	{
		$this->delete("id=$id");
	}

	function cityAdd($cityData){
		//2a3mel row gded
		$row = $this->createRow();
		$row->name = $cityData['name'];
		$row->description = $cityData['description'];
		$row->latitude = $cityData['latitude'];
		$row->longitude = $cityData['longitude'];
		$row->rate = $cityData['rate'];
		$row->image = $cityData['image'];
		$row->country_id = $cityData['country_id'];

		//save in DB
		$row->save();
	}

	function cityEdit($cityData){
		//a3ml array gdeda bel data bas mn 8er el btns
		$customData['name'] = $cityData['name'];
		$customData['description'] = $cityData['description'];
		$customData['latitude'] = $cityData['latitude'];
		$customData['longitude'] = $cityData['longitude'];
		$customData['rate'] = $cityData['rate'];
		$customData['image'] = $cityData['image'];
		$customData['country_id'] = $cityData['country_id'];

		$id = $cityData['id'];

		$this->update($customData,"id= $id");
	}

}

