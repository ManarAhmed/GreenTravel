<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
	//function to start session
	protected function _initSession( ) {
		Zend_Session::start( );
	}

}

