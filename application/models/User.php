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
		//$row->gender = $userData['gender'];

		//save in DB
		$row->save();
	}
	function userDetails($name)
	 {
	 	//$this->setFetchMode(Zend_Db::FETCH_OBJ);
	 	//var_dump($name);
	    $result = $this->fetchRow($this->select()->from('user')->where('username = ?', $name));
	 	//var_dump($result->id);exit();
	 	$id=$result->id;
	   return $this->find($id)->toArray()[0];
	 }
	function updateUser($id,$userData)
 	{
 		//var_dump($name);exit();
 		$user_data['username']=$userData['username'];
 		// var_dump($user_data['username']);exit();
 		$user_data['password']=md5($userData['password']);
 		//$user_data['gender']=$userData['gender'];
 		$user_data['email']=$userData['email'];
 		$this->update($user_data,"id='$id'");

 		$auth = Zend_Auth::getInstance();
		$storage = $auth->getStorage();
		$sessionRead = $storage->read();
		if (!empty($sessionRead)) {
			$sessionRead->username = $userData['username'] ;
		}
 	}

}

