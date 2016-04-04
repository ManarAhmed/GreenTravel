<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
        // heighest six rated countries
        $country_obj=new Application_Model_Country();
        $country_rated=$country_obj->rateCountry();
        $this->view->countrys_rated = $country_rated;

        // heighest six rated cities
        $city_obj=new Application_Model_City();
        $city_rated=$city_obj->rateCity();
        $this->view->citys_rated = $city_rated;

        //list countries
        $country_obj=new Application_Model_Country();
        $countries=$country_obj->listCountries();
        $this->view->countries = $countries;
    }


}

