<?php

class HotelController extends Zend_Controller_Action
{

    public function init()
    {
        $auth = Zend_Auth::getInstance();
        $storage = $auth->getStorage();
        $sessionRead = $storage->read();

        if (!$auth->hasIdentity() && !isset($fbsession->username)) {

            $this->redirect();

        }
        else if($auth->hasIdentity() || isset($fbsession->username)) {
            if ($sessionRead->type == 0 || $fbsession->type == 0){
                if($this->_request->getActionName() == 'list' || $this->_request->getActionName() == 'add' || $this->_request->getActionName() == 'edit' || $this->_request->getActionName() == 'delete'){
                    $this->redirect();
                }
            }
        }
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

                //2ab3at el data lel function ele f el model hotelAdd()
                $hotel_obj->hotelAdd($_POST);
                $this->redirect('/hotel/list');
            }
        }
    }

    public function editAction()
    {
        $form = new Application_Form_Hotel();
        $hotel_obj = new Application_Model_Hotel();
        $hotel_id = $this->_request->getParam("eid");
        $hotel_data = $hotel_obj->hotelDetails($hotel_id);

        $form->populate($hotel_data);
        $this->view->form_c = $form;

        $request = $this->getRequest();
        if($request->isPost()){
            if($form->isValid($_POST)){

                $hotel_obj->hotelEdit($_POST);
                $this->redirect('/hotel/list');
            }
        }
    }


}









