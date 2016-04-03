<?php

class UserController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function addAction()
    {
        $form = new Application_Form_User();
        $this->view->user_form = $form;
        $user_obj = new Application_Model_User();
        //keda ana m3aya el request kolha 3la ba3d
        $request = $this->getRequest();

        if($request->isPost()){
            if($form->isValid($_POST)){
                //2ab3at el data lel function ele f el model userAdd()
                $user_obj->userAdd($_POST);
                $this->redirect('/user/login');
            }
        }
    }

    public function loginAction()
    {
        $form = new Application_Form_Login();
        $this->view->login_form = $form;

        $request = $this->getRequest();

        if($request->isPost()){
            if($form->isValid($_POST)){
                //get email and password from request
                $email = $this->_request->getParam('email');
                $password = $this->_request->getParam('password');

                // get the default db adapter
                $db = Zend_Db_Table::getDefaultAdapter();
                //get an object $authAdapter
                $authAdapter = new Zend_Auth_Adapter_DbTable($db, 'user', 'email','password');
                //set the email and password
                $authAdapter->setIdentity($email); //yshof el mail mwgod f el DB wla l2
                $authAdapter->setCredential(md5($password)); //yshof el pass matching m3ah wla l2
                //authenticate
                $result = $authAdapter->authenticate( );
                //check if the result is valid
                if ($result->isValid( )) {
                    //start session
                    $auth = Zend_Auth::getInstance( );
                    $storage = $auth->getStorage();
                    // write in session email & username $ id $ type
                    $storage->write($authAdapter->getResultRowObject(array('email','username','id','type')));
                    return $this->redirect();
                }else{
                    //if user not valid
                    $this->view->error_message = "Invalid Email or Password!";
                }
            }
        }

        //**********facebook url***********************
        $fb = new Facebook\Facebook([
        'app_id' => '201509036905791', 
        'app_secret' => '533ade11ef8a751159b61a4293a3dfc8',
        'default_graph_version' => 'v2.5'
        ]);

        //define helper with Login Feature
        $helper = $fb->getRedirectLoginHelper();
        $loginUrl = $helper->getLoginUrl($this->view->serverUrl() . $this->view->baseUrl() . '/user/fpauth');
        $this->view->facebook_url = $loginUrl;
        //*********************************************
    }

    public function logoutAction()
    {
        $auth = Zend_Auth::getInstance( );
        $auth->clearIdentity();
        $this->redirect();
    }
    public function fpauthAction()
    {
        //instance from FB
        $fb = new Facebook\Facebook([
        'app_id' => '201509036905791', 
        'app_secret' => '533ade11ef8a751159b61a4293a3dfc8',
        'default_graph_version' => 'v2.5'
        ]);

        $helper = $fb->getRedirectLoginHelper();

        try {
            //get the access token from FB
            $accessToken = $helper->getAccessToken();
        }
        catch (Facebook\Exceptions\FacebookResponseException $e) {
        // When Graph returns an error (headers link)
            echo 'Graph returned an error: ' . $e->getMessage();
            Exit;
        }
        catch (Facebook\Exceptions\FacebookSDKException $e) {
        // hena el library bayza 
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            Exit;
        }

        //if access token in NULL
        if (!isset($accessToken)) {

            if ($helper->getError()) {

                header('HTTP/1.0 401 Unauthorized');
                echo "Error: " . $helper->getError() . "\n";
                echo "Error Code: " . $helper->getErrorCode() . "\n";
                echo "Error Reason: " . $helper->getErrorReason() . "\n";
                echo "Error Description: " . $helper->getErrorDescription() ."\n";

            }else { 
                header('HTTP/1.0 400 Bad Request');
                echo 'Bad request';
            }

            Exit;
        }

        $oAuth2Client = $fb-> getOAuth2Client ();
        //check if access token takes long time
        if (!$accessToken-> isLongLived ()) {
            try {
                // try to get another access token
                $accessToken = $oAuth2Client-> getLongLivedAccessToken ($accessToken);
            }
            //lw m3rfsh ygeb access token tanya
            catch (Facebook\Exceptions\FacebookSDKException $e) {
                echo "<p>Error getting long-lived access token: " . $helper->getMessage () . "</p>\n\n";
                Exit;
            }
        }

        //law gab el access token w kanet valid w kolo tmam 
        $fb->setDefaultAccessToken($accessToken);
        try {
            $response = $fb->get('/me');
            $userNode = $response->getGraphUser(); //get user data only
        }
        catch (Facebook\Exceptions\FacebookResponseException $e) {
            // When Graph returns an error
            echo 'Graph returned an error: ' . $e->getMessage();
            Exit;
        }
        catch (Facebook\Exceptions\FacebookSDKException $e) {
        // lw el library byza
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            Exit;
        }
        //create new session
        $fpsession = new Zend_Session_Namespace('facebook');
        // write in session username
        $fpsession->username = $userNode->getName();
        $this->redirect();
    }

    public function fplogoutAction()
    {
        Zend_Session::namespaceUnset('facebook');
        $this->redirect();
    }



    public function updateAction()
    {
        $form = new Application_Form_Update ();
        $user_model = new Application_Model_User ();
        $name = $this->_request->getParam('name');
        //var_dump($name);exit();
        $filter = new Zend_Filter_Alnum();
        $return = $filter->filter($name);
        //var_dump($return);exit();
        $user_data = $user_model->userDetails($return);
        //var_dump($user_data['id']);exit();
        $id=$user_data['id'];
        //  $name=$user_data['username'];
        // var_dump($name);exit();
        $form->populate($user_data);
        $this->view->user_form = $form;
        $request = $this->getRequest ();
        if($request-> isPost())
        {
          if($form-> isValid($request-> getPost()))
          {
            $user_model-> updateUser ($id, $_POST);
            $this->redirect('/user/index ');
          }
    }
    }

    public function carinfoAction()
    {
        // action body
        $user_model = new Application_Model_User();
        $name = $this->_request->getParam('name');
        //var_dump($id);exit();
        $filter = new Zend_Filter_Alnum();
        $return = $filter->filter($name);
        //var_dump($return);exit();
        $user_data = $user_model->userDetails($return);
        $id=$user_data['id'];
        $carrequest_model = new Application_Model_Carrequest();
        $data=$carrequest_model-> carinfo($id);
        $this->view->data = $data;
      
    }

    public function hotalinfoAction()
    {
           // action body
        $user_model = new Application_Model_User();
        $name = $this->_request->getParam('name');
        //var_dump($id);exit();
        $filter = new Zend_Filter_Alnum();
        $return = $filter->filter($name);
        //var_dump($return);exit();
        $user_data = $user_model->userDetails($return);
        $id=$user_data['id'];
        $hotalrequest_model = new Application_Model_Hotalrequest();
        $data=$hotalrequest_model-> hotalinfo($id);
        $this->view->data = $data;
    }


}

















