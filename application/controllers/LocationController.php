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
        $cid = $this->_request->getParam("id");

        $all_locations = $location_obj->listLocations($cid);
        $this->view->locations = $all_locations;
    }

    public function deleteAction()
    {
        $location_obj = new Application_Model_Location();
        $location_id = $this->_request->getParam("eid");
        $location_obj->locationDelete($location_id);
        $this->redirect("/location/list");
    }

    public function addAction()
    {
        $form = new Application_Form_Location();
        $this->view->location_form = $form;
        $location_obj = new Application_Model_Location();
        $request = $this->getRequest();

        if($request->isPost()){
            if($form->isValid($_POST)){
                
                //2ab3at el data lel function ele f el model locationAdd()
                $location_obj->locationAdd($_POST);
                $this->redirect('/location/list');
            }
        }
    }

    public function editAction()
    {
        $form = new Application_Form_Location();
        $location_obj = new Application_Model_Location();
        $location_id = $this->_request->getParam("eid");
        $location_data = $location_obj->locationDetails($location_id);

        $form->populate($location_data);
        $this->view->form_c = $form;

        $request = $this->getRequest();
        if($request->isPost()){
            if($form->isValid($_POST)){

                $location_obj->locationEdit($_POST);
                $this->redirect('/location/list');
            }
        }
    }

}









