<?php

class HotelController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function listAction()
    {
        $hotel_obj = new Application_Model_Hotel();
        $all_hotels = $hotel_obj->listHotels();
        $this->view->hotels = $all_hotels;
    }

    public function deleteAction()
    {
        $hotel_obj = new Application_Model_Hotel();
        $hotel_id = $this->_request->getParam("eid");
        $hotel_obj->hotelDelete($hotel_id);
        $this->redirect("/hotel/list");
    }

    public function addAction()
    {
        $form = new Application_Form_Hotel();
        $this->view->hotel_form = $form;
        $hotel_obj = new Application_Model_Hotel();
        $request = $this->getRequest();

        if($request->isPost()){
            if($form->isValid($_POST)){

                //2ab3at el data lel function ele f el model cityAdd()
                $hotel_obj->hotelAdd($_POST);
                $this->redirect('/hotel/list');
            }
        }
    }


}







