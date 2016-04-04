<?php

class Application_Form_Hotel extends Zend_Form
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
        'placeholder'=>'search for hotel or hostel',
        'class'=>'form-control',
        'id'=>'name'
        ));
        $name->setLabel('Hotel Name');
        $name->setRequired();
        $name->addValidator('StringLength', false, Array(2,20));
        $name->addFilter('StringTrim');

        $number = new Zend_Form_Element_Select('number');
        $number->setRequired();
        $number->setLabel('Number of Guests');
        $number->addMultiOption('1','1 Adult')->
        addMultiOption('2','2 Adults')->
        addMultiOption('3','3 Adults')->
        addMultiOption('4','4 Adults');
        $number->setAttribs(array(
            'class'=>'form-control',
            'id'=>'number'));

        //submit btn
        $submit = new Zend_Form_Element_Submit('Submit');
        $submit->setValue('submit');
        $submit->setAttrib('class','btn btn-success');

        //reset btn
        $reset = new Zend_Form_Element_Reset('Reset');
        $reset->setValue('reset');
        $reset->setAttrib('class','btn btn-info');
        
        $this->addElements(array(
            $name,
            $number,
            $submit,
            $reset
        ));
    }


}
