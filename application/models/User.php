<?php

class Application_Model_User extends Zend_Db_Table_Abstract
{
	protected $_name = "user";

	function userAdd($userData){
		//2a3mel row gded
		$row = $this->createRow();
		$row->username = $userData['username'];
		$row->password = md5($userData['password']);
		$row->email = $userData['email'];
		$row->gender = $userData['gender'];

		//save in DB
		$row->save();
	}

}

