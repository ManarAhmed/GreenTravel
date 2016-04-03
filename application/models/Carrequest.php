<?php

class Application_Model_Carrequest extends Zend_Db_Table_Abstract
{
  protected $_name = 'carrequest';
  function carinfo($id)

	{
      //var_dump($id);exit();

        $result = $this->fetchRow($this->select()->from('carrequest')->where('user_id = ?', $id));
	 	//var_dump($result);exit();
	 	
	   return $result;
    }   
}

