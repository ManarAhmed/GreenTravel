<?php

class CityController extends Zend_Controller_Action
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
        $city_obj = new Application_Model_City();
        $all_cities = $city_obj->listAllCities();
        $this->view->cities = $all_cities;
        //get country name by ID
        // $country_obj = new Application_Model_Country();
        // $country_name = $country_obj->getCountry($all_cities["country_id"]);
        // $this->view->country_name = $country_name;
    }

    public function deleteAction()
    {
        $city_obj = new Application_Model_City();
        $city_id = $this->_request->getParam("eid");
        $city_obj->cityDelete($city_id);
        $this->redirect("/city/list");
    }

    public function addAction()
    {
        $form = new Application_Form_City();
        $this->view->city_form = $form;
        $city_obj = new Application_Model_City();
        $request = $this->getRequest();

        if($request->isPost()){
            if($form->isValid($_POST)){

                $upload = new Zend_File_Transfer_Adapter_Http();
                $upload->addFilter('Rename',"/var/www/html/zend_project/public/uploads/countries/".$_POST['name'].".jpeg");
                $upload->receive();
                $_POST['image_path']="/uploads/countries/".$_POST['name'].".jpeg";
                //2ab3at el data lel function ele f el model cityAdd()
                $city_obj->cityAdd($_POST);
                $this->redirect('/city/list');
            }
        }
    }

    public function editAction()
    {
        $form = new Application_Form_City();
        $city_obj = new Application_Model_City();
        $city_id = $this->_request->getParam("eid");
        $city_data = $city_obj->citydetails($city_id);

        $form->populate($city_data);
        $this->view->form_c = $form;

        $request = $this->getRequest();
        if($request->isPost()){
            if($form->isValid($_POST)){

                $city_obj->cityEdit($_POST);
                $this->redirect('/city/list');
            }
        }
    }


}









