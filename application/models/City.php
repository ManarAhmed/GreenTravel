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
		return $this->find($id)->toArray();
	}

}

