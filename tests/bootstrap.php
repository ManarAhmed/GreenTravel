<?php

// Define path to application directory
defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));

// Define application environment
defined('APPLICATION_ENV')
    || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'testing'));

// Ensure library/ is on include_path
set_include_path(implode(PATH_SEPARATOR, array(
    realpath(APPLICATION_PATH . '/../library'),
    get_include_path(),
)));

require_once 'Zend/Loader/Autoloader.php';
Zend_Loader_Autoloader::getInstance();
//protected function _initViewHelpers()
//{
//    # $view->addHelperPath("ZendX/JQuery/View/Helper", "ZendX_JQuery_View_Helper");
//    # $view->jQuery()->addStylesheet('/js/jquery/css/ui-lightness/jquery-ui-1.7.2.custom.css')
//    #     ->setLocalPath('/js/jquery/js/jquery-1.3.2.min.js')
//    #     ->setUiLocalPath('/js/jquery/js/jquery-ui-1.7.2.custom.min.js');
//    $this->bootstrap('layout');
//    $layout = $this->getResource('layout');
//    $view = $layout->getView();
//
//    ZendX_JQuery_View_Helper_JQuery::enableNoConflictMode();
//    $view->addHelperPath('ZendX/JQuery/View/Helper/', 'ZendX_JQuery_View_Helper');
//    $view->addHelperPath('ZendX/JQuery/View/Helper/JQuery', 'ZendX_JQuery_View_Helper_JQuery');
//    $view->addHelperPath('Core/View/Helper/', 'Core_View_Helper');
//
//}
