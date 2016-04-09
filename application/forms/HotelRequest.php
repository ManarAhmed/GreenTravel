<?php

class Application_Form_HotelRequest extends Zend_Form {

    public function init() {
        $this->setMethod('POST');
        $this->setAttribs(array(
            'class' => 'container',
        ));
        $id = new Zend_Form_Element_Hidden('id');

        //hotel name in certain city
        $name = new Zend_Form_Element_Select('name');
        $name->setAttribs(Array(
            'placeholder' => 'search for hotel or hostel',
            'class' => 'form-control',
            'id' => 'name'));
        $name->setLabel('Hotel Name');
        $name->setRequired();


        //number of guests in room
        $number = new Zend_Form_Element_Select('number');
        $number->setRequired();
        $number->setLabel('Number of Guests');
        $number->setAttribs(Array(
            'class' => 'form-control',
            'id' => 'number'));
        $number->addMultiOption('1', '1 Adult')->
                addMultiOption('2', '2 Adults')->
                addMultiOption('3', '3 Adults')->
                addMultiOption('4', '4 Adults');
        $number->setAttribs(array(
            'class' => 'form-control',
            'id' => 'number'));

        //submit btn
        $submit = new Zend_Form_Element_Submit('Submit');
        $submit->setValue('submit');
        $submit->setAttribs(array(
            'class'=>'btn btn-success col-offset-lg-3 col-xs-12 col-md-5 '
            ));

        //reset btn
        $reset = new Zend_Form_Element_Reset('Reset');
        $reset->setValue('reset');
        $reset->setAttrib('class', 'btn btn-info col-offset-lg-12 col-xs-12 col-md-5');
        
        //add elements to the form   
        $this->addElements(array(
            $name,
            $number,
            $submit,
            $reset
        ));
    }

}
