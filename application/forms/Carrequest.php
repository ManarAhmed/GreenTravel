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
        // $name = new Zend_Form_Element_Text('name');
        // $name->setAttribs(Array(
        // 'placeholder'=>'enter pickup location',
        // 'class'=>'form-control'
        // ));
        // $name->setRequired();
        $name = new Zend_Form_Element_Select('name');
        $name->setLabel('enter location :');
        //$name->setRequired();


        // $time_form_hour = new Zend_Form_Element_Text('time_form_hour');
        // $time_form_hour->setAttribs(Array(
        // 'placeholder'=>'enter hours from 1 to 24',
        // 'class'=>'form-control'
        // ));
        // $time_form_hour->setRequired();

        $time_form_hour = new Zend_Form_Element_Select('$time_form_hour');
        // $time_form_hour->setRequired();
        $time_form_hour->setLabel('from hour:');
        $time_form_hour->addMultiOption('1','1')->
        addMultiOption('2','2 ')->
        addMultiOption('3','3 ')->
        addMultiOption('4','4 ')->
        addMultiOption('5','5 ')->
        addMultiOption('6','6 ')->
        addMultiOption('7','7 ')->
        addMultiOption('8','8 ')->
        addMultiOption('9','9 ')->
        addMultiOption('10','10 ')->
        addMultiOption('11','11 ')->
        addMultiOption('12','12');
        $time_form_hour->setAttribs(array(
            'class'=>'form-control',
            'id'=>'time_form_hour'));



        // $time_form_min = new Zend_Form_Element_Text('time_form_min');
        // $time_form_min->setAttribs(Array(
        // 'placeholder'=>'enter minutes from 1 to 60',
        // 'class'=>'form-control'
        // ));
        // $time_form_min->setRequired();


        $time_form_min = new Zend_Form_Element_Select('$time_form_min');
        // $time_form_min->setRequired();
        $time_form_min->setLabel(' from minute:');
        $time_form_min->addMultiOption('1','05')->
        addMultiOption('2','10 ')->
        addMultiOption('3','15 ')->
        addMultiOption('4','20 ')->
        addMultiOption('5','25 ')->
        addMultiOption('6','30 ')->
        addMultiOption('7','35 ')->
        addMultiOption('8','40 ')->
        addMultiOption('9','45 ')->
        addMultiOption('10','50 ')->
        addMultiOption('11','55 ')->
        addMultiOption('12','60');
        $time_form_min->setAttribs(array(
            'class'=>'form-control',
            'id'=>'time_form_min'));







         $am_pm1 = new Zend_Form_Element_Select('$am_pm1');
        // $time_form_min->setRequired();
        //$am_pm->setLabel('');
        $am_pm1->addMultiOption('1','AM')->
        addMultiOption('2','PM ');
        $am_pm1->setAttribs(array(
            'class'=>'form-control',
            'id'=>'am_pm1'));

        // $time_to_hour = new Zend_Form_Element_Text('time_to_hour');
        // $time_to_hour->setAttribs(Array(
        // 'placeholder'=>'enter hours from 1 to 24',
        // 'class'=>'form-control'
        // ));
        // $time_to_hour->setRequired();


        $time_to_hour = new Zend_Form_Element_Select('$time_to_hour');
        // $time_to_hour->setRequired();
        $time_to_hour->setLabel(' to hour:');
        $time_to_hour->addMultiOption('1','1')->
        addMultiOption('2','2 ')->
        addMultiOption('3','3 ')->
        addMultiOption('4','4 ')->
        addMultiOption('5','5 ')->
        addMultiOption('6','6 ')->
        addMultiOption('7','7 ')->
        addMultiOption('8','8 ')->
        addMultiOption('9','9 ')->
        addMultiOption('10','10 ')->
        addMultiOption('11','11 ')->
        addMultiOption('12','12');
        $time_to_hour->setAttribs(array(
            'class'=>'form-control',
            'id'=>'time_to_hour'));

        // $time_to_min = new Zend_Form_Element_Text('time_to_min');
        // $time_to_min->setAttribs(Array(
        // 'placeholder'=>'enter minutes from 1 to 60',
        // 'class'=>'form-control'
        // ));
        // $time_to_min->setRequired();

        $time_to_min = new Zend_Form_Element_Select('$time_to_min');
        // $time_to_min->setRequired();
        $time_to_min->setLabel(' to minute:');
        $time_to_min->addMultiOption('1','05')->
        addMultiOption('2','10 ')->
        addMultiOption('3','15 ')->
        addMultiOption('4','20 ')->
        addMultiOption('5','25 ')->
        addMultiOption('6','30 ')->
        addMultiOption('7','35 ')->
        addMultiOption('8','40 ')->
        addMultiOption('9','45 ')->
        addMultiOption('10','50 ')->
        addMultiOption('11','55 ')->
        addMultiOption('12','60');
        $time_to_min->setAttribs(array(
            'class'=>'form-control',
            'id'=>'time_to_min'));

        $am_pm2 = new Zend_Form_Element_Select('$am_pm2');
        // $time_form_min->setRequired();
        //$am_pm->setLabel('');
        $am_pm2->addMultiOption('1','AM')->
        addMultiOption('2','PM ');
        $am_pm2->setAttribs(array(
            'class'=>'form-control',
            'id'=>'am_pm2'));


        $date_from = new Zend_Form_Element_Text('date_from');
        $date_from->setLabel(' date from:');
        $date_from->setAttribs(Array(
        'readonly'=>'readonly',
        'class'=>'form-control'
        ));
        //$date_from->setRequired();



        $date_to = new Zend_Form_Element_Text('date_to');
        $date_to->setLabel(' date to:');
        $date_to->setAttribs(Array(
        'readonly'=>'readonly',
        'class'=>'form-control'
        ));
        //$date_from->setRequired();

        //submit btn
        $submit = new Zend_Form_Element_Submit('submit');

        $submit->setValue('submit');
        $submit->setAttrib('class','btn btn-success');

        $this->addElements(array(
            $name,
            $date_from,
            $time_form_hour,
            $time_form_min,
            $am_pm1,
            $date_to,
            $time_to_hour,
            $time_to_min,
            $am_pm2,
            $submit

     
        ));
    }


}



