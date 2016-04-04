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


}





