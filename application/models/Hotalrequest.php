<?php

class Application_Model_Hotalrequest extends Zend_Db_Table_Abstract
{
    protected $_name = 'hotelreserve';
  function hotalinfo($id)

	{
      //var_dump($id);exit();

        $result = $this->fetchRow($this->select()->from('hotelreserve')->where('user_id = ?', $id));
	 	//var_dump($result);exit();
	 	
	   return $result;
    }   

}

