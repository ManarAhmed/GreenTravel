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
        // action body
        $city_obj=new Application_Model_City();
        $co_id=$this->_request->getParam("cid");
        $cities=$city_obj->listCities($co_id);
        $this->view->cities=$cities;
    }

    public function cityAction()
    {
        // action body
        $city_obj=new Application_Model_City();
        $ci_id=$this->_request->getParam("id");
        $city=$city_obj->citydetails($ci_id);
        $this->view->city=$city[0];
    }

    public function listAction()
    {
        $country_obj = new Application_Model_Country();
        $all_countries = $country_obj->listCountries();
        $this->view->countries = $all_countries;
    }

    public function deleteAction()
    {
        $country_obj = new Application_Model_Country();
        $country_id = $this->_request->getParam("eid");
        $country_obj->countryDelete($country_id);
        $this->redirect("/country/list");
    }


}











