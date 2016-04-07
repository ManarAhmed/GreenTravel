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

    public function hotelreserveAction()
    {
        // get city id 
        $hotel_obj=new Application_Model_Hotel();
        $city_id = $this->_request->getParam("id");
//      $hotels=$hotel_obj->listHotels($ci_id);
//      $this->views->hotels = $hotels;
//       
        //get user id from his session
        $auth = Zend_Auth::getInstance();
        $storage = $auth->getStorage();
        $sessionRead = $storage->read();
        $uid = $sessionRead->id;

        //add hotel reservation data and redirect for city page
        $hotel_form = new  Application_Form_HotelRequest();
        $request = $this->getRequest();
        if($request->isPost()){
            if($hotel_form->isValid($request->getPost())){
                $hotelres_obj = new Application_Model_Hotalrequest();
                $hotel_obj = new Application_Model_Hotel();
                $hotel = $hotel_obj->getHotelByName($request->getParam('name'));
                $hotelres_obj-> addHotelRes($request->getParams(),$uid,$hotel[0]['id']);
                $this->redirect("/city/display?id=".$city_id);
            }
        }

        $this->view->hotel_form = $hotel_form;
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
                $upload->addFilter('Rename',"/var/www/html/zend_project/public/uploads/cities/".$_POST['name'].time().".jpeg");
                $upload->receive();
                $_POST['image']="/uploads/cities/".$_POST['name'].".jpeg";
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

                $upload = new Zend_File_Transfer_Adapter_Http();
                $upload->addFilter('Rename',"/var/www/html/zend_project/public/uploads/cities/".$_POST['name'].time().".jpeg");
                $upload->receive();
                $_POST['image']="/uploads/cities/".$_POST['name'].".jpeg";

                $city_obj->cityEdit($_POST);
                $this->redirect('/city/list');
            }
        }
    }

    public function displayAction()
    {
        // action body
        $city_obj = new Application_Model_City();
        $city_post= new Application_Model_Experience();
        $city_id = $this->_request->getParam("id");
        $city_row=$city_obj->citydetails($city_id);
        $this->view->city_id=$city_row['id'];
        $this->view->city_desc= $city_row['description'];
        $this->view->city_img= $city_row['image'];
        $this->view->city_lat= $city_row['latitude'];
        $this->view->city_long= $city_row['longitude'];
        $this->view->city_rate= $city_row['rate'];
        $set=$city_post->cityPosts($city_id);

        Zend_View_Helper_PaginationControl::setDefaultViewPartial('/city/paginate.phtml');
        $paginator = Zend_Paginator::factory($set);
        $paginator->setCurrentPageNumber($this->_getParam('page', 1));
        $paginator->setItemCountPerPage(2);

        $this->view->paginator = $paginator;
    }

    public function postAction()
    {
        // action body
        $is_owner=0;
        $city_post= new Application_Model_Experience();
        $post_id= $this->_request->getParam("post_id");
        $post_row=$city_post->cityPost($post_id);
        $this->view->post=$post_row;
        $this->view->post_id= $post_id;
        $sessionId=$_SESSION['Zend_Auth']['storage']->id;
        $this->view->userId=$post_row[0]['user_id'];
        $this->view->sessionId=$sessionId;
        if(isset($_SESSION['Zend_Auth']['storage']->id)){
            $user_id=$_SESSION['Zend_Auth']['storage']->id;
            if($user_id==$post_row[0]['user_id']){$is_owner=1;}
        }
        $this->view->is_owner=$is_owner;
    }

    public function carreservationAction()
    {
        // action body
        $city_id = $this->_request->getParam("id");

//var_dump($city_id);exit();
        $auth = Zend_Auth::getInstance();
        $storage = $auth->getStorage();

        $sessionRead = $storage->read();
       $uid = $sessionRead->id;
       //var_dump($uid);exit(); 
         $car_form = new  Application_Form_Carrequest();
        $request = $this->getRequest();
        if($request->isPost()){
            if($car_form->isValid($request->getPost())){
               
                $carres_obj = new Application_Model_Carrequest();
                $carres_obj-> addcarRes($request->getParams(),$uid);
                $this->redirect("/city/display?id=".$city_id);
            }
    }
    $this->view->car_form = $car_form;

    }

    public function addpostAction()
    {
        // action body
        if(!isset($_SESSION['Zend_Auth']['storage']))
        {$this->redirect('/');}
        $city_post= new Application_Model_Experience();
        $city_id = $this->_request->getParam("city_id");
        $post = new Application_Form_Addpost();
        $this->view->addpost=$post;
        $req = $this->getRequest();
        if($req->isPost()){
            if($post->isValid($req->getPost())){
                $user_id= $_SESSION['Zend_Auth']['storage']->id;
                $title= $_POST['title'];
                $content=$_POST['content'];
                $city_post->addPost($city_id,$user_id,$title,$content);
                $this->redirect('/city/display/id/'.$city_id);

            }
        }


    }

    public function editpostAction()
    {
        // action body
        if(!isset($_SESSION['Zend_Auth']['storage']))
        {$this->redirect('/');}
        $post_obj= new Application_Model_Experience();
        $post = new Application_Form_Addpost();
        $post_id=$this->_request->getParam("post_id");
        $req = $this->getRequest();
        $post_row= $post_obj->cityPost($post_id);
        $post->populate($post_row[0]);
        $city_id = $post_row[0]['city_id'];
        $this->view->editpost=$post;
        if($req->isPost()) {
            if ($post->isValid($req->getPost())) {
                $data['title']= $_POST['title'];
                $data['content']= $_POST['content'];
                $post_obj->editPost($post_id,$data);
//                $new_content = $_POST['content'];
                $this->redirect('/city/display/id/'.$city_id);
            }
        }

    }

    public function deletepostAction()
    {
        // action body
        if(!isset($_SESSION['Zend_Auth']['storage']))
        {$this->redirect('/');}
        $post_obj= new Application_Model_Experience();
        $post_id=$this->_request->getParam("post_id");
        $post_row= $post_obj->cityPost($post_id);
        $city_id=$post_row[0]['city_id'];
        $post_obj->deletePost($post_id);
        $this->redirect('/city/display/id/'.$city_id);

    }


}






