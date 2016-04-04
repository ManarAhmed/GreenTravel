<?php

class Application_Form_Country extends Zend_Form
{

    public function init()
    {
        $this->setMethod('POST');
        $this->setAttrib('class','form-horizontal');

        //id
        $id = new Zend_Form_Element_Hidden('id');

        //name
        $name = new Zend_Form_Element_Text('name');
        $name->setLabel('Country Name');
        $name->setAttrib('placeholder','County Name');
        $name->setAttrib('class','form-control');
        $name->setRequired();
        $name->AddValidator('StringLength',false,array(3,20));
        $name->AddValidator('db_NoRecordExists',true,array('country','name'));

        //rate
        $rate = new Zend_Form_Element_Text('rate');
        $rate->setLabel('Rate');
        $rate->setAttrib('class','form-control');
        $rate->setRequired();
        $rate->addValidator('Digits');

        //image path
        $image_path = new Zend_Form_Element_File('image');
        $image_path->setLabel('Upload an image:');
        $image_path->addValidator('Count', false, 1);
        $image_path->addValidator('Extension',false, 'jpg,jpeg,png,gif');
        $image_path->setAttrib('class','text-danger');
        $image_path->setRequired();

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
        	$image_path,
        	$rate,
        	$submit,
        	$reset
        	));
    }


}

