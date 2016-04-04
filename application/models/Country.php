<?php

class Application_Model_Country extends Zend_DB_Table_Abstract
{
	protected $_name = "country";

	function rateCountry() {
		return $this->fetchAll(null,"rate DESC",6)->toArray();
	}

	function listCountries(){

		//returns all countries from db
		return $this->fetchAll(null,"name ASC")->toArray();
	}

	function getCountry($id){
		
		return $this->find($id)->toArray()[0];
	}

	function countryDelete($id)
	{
		$this->delete("id=$id");
	}

	function countryAdd($countryData){
		//2a3mel row gded
		$row = $this->createRow();
		$row->name = $countryData['name'];
		$row->rate = $countryData['rate'];
		$row->image = $countryData['image'];

		//save in DB
		$row->save();
	}

	function countryEdit($countryData){
		
		$customData['name'] = $countryData['name'];
		$customData['rate'] = $countryData['rate'];
		$customData['image'] = $countryData['image'];

		$id = $countryData['id'];

		$this->update($customData,"id= $id");
	}

}