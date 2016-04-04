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

    public function detailsAction()
    {
        // action body
    }

    # public function hotelreserveActionAction()
    # {
    #     // action body
    # }

    public function hotelreserveAction()
    {
        // get city id 
        $hotel_obj=new Application_Model_Hotel();
        $city_id = $this->_request->getParam("cid");
//        $hotels=$hotel_obj->listHotels($ci_id);
//        $this->views->hotels = $hotels;
//       
        //get user id from his session
        $auth = Zend_Auth::getInstance();
        $storage = $auth->getStorage();
        $sessionRead = $storage->read();
        $uid = $sessionRead->id;
        
        //add hotel reservation data and redirect for city page
        $hotel_form = new Application_Form_Hotel();
        $request = $this->getRequest();
        if($request->isPost()){
            if($hotel_form->isValid($request->getPost())){
                $hotelres_obj = new Application_Model_Hotalrequest();
                $hotel_obj = new Application_Model_Hotel();
                $hotel = $hotel_obj->getHotelByName($request->getParam('name'));
                $hotelres_obj-> addHotelRes($request->getParams(),$uid,$hotel[0]['id']);
                $this->redirect("/country/city?id=".$city_id);
            }
        }

        $this->view->hotel_form = $hotel_form;
    }


}











