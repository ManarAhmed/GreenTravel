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
}

