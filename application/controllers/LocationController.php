<?php

class LocationController extends Zend_Controller_Action
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
        $location_obj = new Application_Model_Location();
        $all_locations = $location_obj->listLocations();
        $this->view->locations = $all_locations;
    }

    public function deleteAction()
    {
        $location_obj = new Application_Model_Location();
        $location_id = $this->_request->getParam("eid");
        $location_obj->locationDelete($location_id);
        $this->redirect("/location/list");
    }


}





