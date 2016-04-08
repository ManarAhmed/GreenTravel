<?php

class CountryController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function citiesAction()
    {
        // list all countries to send them to layout
        $country_obj = new Application_Model_Country();
        $all_countries = $country_obj->listCountries();
        $this->view->countries = $all_countries;
        Zend_Layout::getMvcInstance()->assign('countries', $all_countries);
        //list all cities in certain country
        $city_obj=new Application_Model_City();
        $country_obj=new Application_Model_Country();
        $country_id=$this->_request->getParam("cid");
        $country=$country_obj->getCountry($country_id);
        $cities=$city_obj->listCities($country_id);
        $this->view->cities=$cities;
        $this->view->country=$country;
    }

    public function cityAction()
    {
        // show details for certain city
        $city_obj=new Application_Model_City();
        $ci_id=$this->_request->getParam("id");
        $city=$city_obj->citydetails($ci_id);
        $this->view->city=$city[0];
    }

    public function listAction()
    {
        #list all countrys
        $country_obj = new Application_Model_Country();
        $all_countries = $country_obj->listCountries();
        $this->view->countries = $all_countries;
        return $all_countries;
    }

    public function deleteAction()
    {
        $country_obj = new Application_Model_Country();
        $country_id = $this->_request->getParam("eid");
        $country_obj->countryDelete($country_id);
        $this->redirect("/country/list");
    }

    public function addAction()
    {
        $form = new Application_Form_Country();
        $this->view->country_form = $form;
        $country_obj = new Application_Model_Country();
        $request = $this->getRequest();

        if($request->isPost()){
            if ($form->isValid($_POST)) {
                $_POST['image'] = "/uploads/countries/" .$_FILES['image']['name'];
                //2ab3at el data lel function ele f el model countryAdd()
                $country_obj->countryAdd($_POST);
                $this->redirect('/country/list');
            }
        }
    }

    public function editAction()
    {
        $form = new Application_Form_Country();
        $country_obj = new Application_Model_Country();
        $country_id = $this->_request->getParam("eid");
        $country_data = $country_obj->getCountry($country_id);

        $form->populate($country_data);
        $this->view->form_c = $form;

        $request = $this->getRequest();
        if($request->isPost()){
            if($form->isValid($_POST)){

                $upload = new Zend_File_Transfer_Adapter_Http();
                $upload->addFilter('Rename',"/var/www/html/zend_project/public/uploads/countries/".$_POST['name'].time().".jpeg");
                $upload->receive();
                $_POST['image']="/uploads/countries/".$_POST['name'].".jpeg";

                $country_obj->countryEdit($_POST);
                $this->redirect('/country/list');
            }
        }
    }


}















