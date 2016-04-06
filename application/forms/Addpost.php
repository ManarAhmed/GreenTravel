<?php

class Application_Form_Addpost extends Zend_Form
{

    public function init()
    {
        $this->setMethod('POST');
        $title= new Zend_Form_Element_Text("title");
        $title->setLabel("Title : ");

        $content= new Zend_Form_Element_Textarea("content");
        $content->setLabel("Post Content: ");
        $title->setRequired();
        $content->setRequired();

        $submit=new Zend_Form_Element_Submit("submit");
        $submit->setValue("Add Experience");

        $this->addElements( array(
                $title,
                $content,
                $submit
            )
        );


    }


}

