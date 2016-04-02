<?php

class Application_Model_Country extends Zend_DB_Table_Abstract
{
	protected $_name = "country";

	function rateCountry() {
		return $this->fetchAll(null,"rate DESC",6)->toArray();
	}

	function listCountries(){
		return $this->fetchAll(null,"name ASC")->toArray();
	}

}