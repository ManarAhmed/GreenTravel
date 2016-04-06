<?php

class Application_Form_Carrequest extends Zend_Form
{

    public function init()
    {

        /* Form Elements & Other Definitions Here ... */
         $this->setMethod('POST');
        $this->setAttribs(array(
            'class'=>'container',
            ));
        $id = new Zend_Form_Element_Hidden('id');
        $name = new Zend_Form_Element_Text('name');
        $name->setAttribs(Array(
        'placeholder'=>'enter pickup location',
        'class'=>'form-control'
        ));
        $name->setRequired();
        // $name->addValidator('StringLength', false, Array(2,20));
        // $name->addFilter('StringTrim');

        $time_form_hour = new Zend_Form_Element_Text('name');
        $time_form_hour->setAttribs(Array(
        'placeholder'=>'enter hours from 1 to 24',
        'class'=>'form-control'
        ));
        $time_form_hour->setRequired();

        $time_form_min = new Zend_Form_Element_Text('name');
        $time_form_min->setAttribs(Array(
        'placeholder'=>'enter minutes from 1 to 60',
        'class'=>'form-control'
        ));
        $time_form_min->setRequired();

        $time_to_hour = new Zend_Form_Element_Text('name');
        $time_to_hour->setAttribs(Array(
        'placeholder'=>'enter hours from 1 to 24',
        'class'=>'form-control'
        ));
        $time_to_hour->setRequired();

        $time_to_min = new Zend_Form_Element_Text('name');
        $time_to_min->setAttribs(Array(
        'placeholder'=>'enter minutes from 1 to 60',
        'class'=>'form-control'
        ));
        $time_to_min->setRequired();


        //submit btn
        $submit = new Zend_Form_Element_Submit('get your quote');
        $submit->setValue('get your quote');
        $submit->setAttrib('class','btn btn-success');

        $this->addElements(array(
            $name,
            $time_form_hour,
            $time_form_min,
            $time_to_hour,
            $time_to_min,
            $submit

     
        ));
    }


}



