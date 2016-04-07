<?php

class Application_Form_User extends Zend_Form
{

    public function init()
    {
        $this->setMethod('POST');
        $this->setAttrib('class','form-horizontal');

        //id
        $id = new Zend_Form_Element_Hidden('id');

        //username
        $username = new Zend_Form_Element_Text('username');
        $username->setLabel('UserName');
        $username->setAttrib('placeholder','UserName');
        $username->setAttrib('class','form-control');
        $username->setRequired();

        //email
        $email = new Zend_Form_Element_Text('email');
        $email->setLabel('Email');
        $email->setAttrib('placeholder','Email');
        $email->setAttrib('class','form-control');
        $email->AddValidator('EmailAddress');
        $email->AddValidator('db_NoRecordExists',true,array('user','email'));

        //password
        $password = new Zend_Form_Element_Password('password');
        $password->setLabel('Password');
        $password->setAttrib('placeholder','Password');
        $password->setAttrib('class','form-control');
        $password->setRequired();

        //confirm password
        $repassword = new Zend_Form_Element_Password('repassword');
        $repassword->setLabel('Re-Password');
        $repassword->setAttrib('placeholder','Re-Password');
        $repassword->setAttrib('class','form-control');
        $repassword->AddValidator('identical',true,'password');

        //gender
        $gender = new Zend_Form_Element_Select('gender');
        $gender->setLabel('Gender');
        $gender->setAttrib('class','form-control');
        $gender->addMultiOption('male','Male');
        $gender->addMultiOption('female','Female');

        

        //submit btn
        $submit = new Zend_Form_Element_Submit('Submit');
        $submit->setValue('submit');
        $submit->setAttrib('class','btn btn-success');

        //reset btn
        $reset = new Zend_Form_Element_Reset('Reset');
        $reset->setValue('reset');
        $reset->setAttrib('class','btn btn-info');

        //to add these element to the form
        $this->addElements(array(
        	$id,
        	$username,
        	$password,
            $repassword,
        	$gender,
        	$email,
        	$submit,
        	$reset
        	));
    }


}

