<?php

class Application_Form_Login extends Zend_Form
{

    public function init()
    {
        $this->setMethod('POST');
        $this->setAttrib('class','form-horizontal');

        //email
        $email = new Zend_Form_Element_Text('email');
        $email->setLabel('Email');
        $email->setAttrib('placeholder','Email');
        $email->setAttrib('class','form-control');
        $email->setRequired();
        $email->AddValidator('db_RecordExists',true,array('user','email'));

        //password
        $password = new Zend_Form_Element_Password('password');
        $password->setLabel('Password');
        $password->setAttrib('placeholder','Password');
        $password->setAttrib('class','form-control');
        $password->setRequired();

        //submit btn
        $submit = new Zend_Form_Element_Submit('Submit');
        $submit->setValue('submit');
        $submit->setAttrib('class','btn btn-success create-acc col-md-offset-1 col-xs-12 col-md-5');

        $this->addElements(array(
        	$email,
        	$password,
        	$submit
        	));
    }


}

