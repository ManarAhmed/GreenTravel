<?php

class Application_Form_City extends Zend_Form
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
    //    $name->AddValidator('db_NoRecordExists',true,array('city','name'));

        //description
        $description = new Zend_Form_Element_Textarea('description');
        $description->setLabel('Description');
        $description->setAttrib('class','form-control');
        $description->setAttribs(array('cols'=>'5', 'rows'=>'6'));
        $description->setRequired();

        //latitude
        $latitude = new Zend_Form_Element_Text('latitude');
        $latitude->setLabel('Latitude');
        $latitude->setAttrib('class','form-control');
        $latitude->setRequired();
        $latitude->addValidator('Digits');

        //longitude
        $longitude = new Zend_Form_Element_Text('longitude');
        $longitude->setLabel('Longitude');
        $longitude->setAttrib('class','form-control');
        $longitude->setRequired();
        $longitude->addValidator('Digits');

        //rate
        $rate = new Zend_Form_Element_Text('rate');
        $rate->setLabel('Rate');
        $rate->setAttrib('class','form-control');
        $rate->setRequired();
        $rate->addValidator('Digits');

        //image 
        $image = new Zend_Form_Element_File('image');
        $image->setLabel('Upload an image:');
        $image->addValidator('Count', false, 1);
        $image->addValidator('Extension',false, 'jpg,jpeg,png,gif');
        $image->setAttrib('class','text-danger');
        $image->setRequired();

        //country
        $country = new Zend_Form_Element_Select('country_id');
        $country->setAttrib('class','form-control');
        $country->setLabel('Country');
        //create object from country model
        $country_obj = new Application_Model_Country();
        $all_countries = $country_obj->listCountries();
        foreach($all_countries as $key=>$value){
        	$country->addMultiOption($value['id'],$value['name']);
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
        	$description,
        	$image,
        	$rate,
        	$latitude,
        	$longitude,
        	$country,
        	$submit,
        	$reset
        	));
    }


}

