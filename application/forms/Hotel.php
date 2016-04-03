<?php

class Application_Form_Hotel extends Zend_Form
{

    public function init()
    {
        $this->setMethod('POST');
        $this->setAttrib('class','form-horizontal');

        //id
        $id = new Zend_Form_Element_Hidden('id');

        //name
        $name = new Zend_Form_Element_Text('name');
        $name->setLabel('City Name');
        $name->setAttrib('placeholder','City Name');
        $name->setAttrib('class','form-control');
        $name->setRequired();
        $name->AddValidator('StringLength',false,array(3,20));
        $name->AddValidator('db_NoRecordExists',true,array('city','name'));

        //city
        $city = new Zend_Form_Element_Select('city_id');
        $city->setAttrib('class','form-control');
        $city->setLabel('City');
        //create object from city model
        $city_obj = new Application_Model_City();
        $all_cities = $city_obj->listCities();
        foreach($all_cities as $key=>$value){
        	$city->addMultiOption($value['id'],$value['name']);
        }

        //submit btn
        $submit = new Zend_Form_Element_Submit('Submit');
        $submit->setValue('Add');
        $submit->setAttrib('class','btn btn-success');

        //reset btn
        $reset = new Zend_Form_Element_Reset('Reset');
        $reset->setValue('Reset');
        $reset->setAttrib('class','btn btn-danger');

    

        //to add these element to the form
        $this->addElements(array(
        	$id,
        	$name,
        	$city,
        	$submit,
        	$reset
        	));
    }


}

