<?php

class Application_Form_Addpost extends Zend_Form
{

    public function init()
    {
        $this->setMethod('POST');
        $this->setAttrib('class','form-horizontal');

        $title= new Zend_Form_Element_Text("title");
        $title->setLabel("Title : ");
        $title->setAttrib('class','form-control');

        $content= new Zend_Form_Element_Textarea("content");
        $content->setLabel("Post Content: ");
        $title->setRequired();
        $content->setRequired();
        $content->setAttrib('class','form-control');
        $content->setAttribs(array('cols'=>'5', 'rows'=>'10'));

        $submit=new Zend_Form_Element_Submit("submit");
        $submit->setValue("Add Experience");
        $submit->setAttrib('class','btn btn-success');

        $this->addElements( array(
                $title,
                $content,
                $submit
            )
        );


    }


}

