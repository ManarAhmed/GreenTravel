<?php

class Application_Model_Carrequest extends Zend_Db_Table_Abstract
{
  protected $_name = 'carrequest';
  function carinfo($id)

	{
        $result = $this->fetchRow($this->select()->from('carrequest')->where('user_id = ?', $id));
	 	
	   return $result;
    }   
    function addcarRes($car_data,$uid){
       $row = $this->createRow();
        $row->user_id = $uid;
        //var_dump($car_data['am_pm1']);exit();
  
        $am_pm1=$car_data['am_pm1'];
        $am_pm2=$car_data['am_pm2'];
        $t11 = $car_data['time_form_hour'];
        $t12 = $car_data['time_form_min'];
        $t1=$t11.":".$t12."".$am_pm1;
        
        $t21 = $car_data['time_to_hour'];
        $t22 = $car_data['time_to_min'];
        $t2=$t21.":".$t22."".$am_pm2;

        $row->source = $car_data['name'];
        $row->date_from = $t1;
        $row->date_to = $t2;
        $row->city_id = $car_data['id'];
        //var_dump($car_data['date_form']);
        $row->datef =$car_data['date_from'];
        $row->datet=$car_data['date_to'];
        $row->save();  
    }
}

