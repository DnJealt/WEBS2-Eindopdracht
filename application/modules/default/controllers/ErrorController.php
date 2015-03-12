<?php

/**
 * @author Mark van Kleef (mkleef@avans.nl)
 * @copyright Copyright (c) 2015, Avans Hogeschool - All rights reserved
 * @version 1.0.0
 */

class ErrorController extends Zend_Controller_Action
{
    const controllerLangKey     = "Error";
    const errorActionLangKey    = "Foutmeldingen";
    const denyActionLangKey     = "Geen toegang";

	/**
	 * Display the error page
	 * 
	 * @return void
	 */
	public function errorAction()
	{
        $this->getResponse()->clearBody();

        $errors = $this->_getParam('error_handler');
        
        switch($errors->type)
        {
            case Zend_Controller_Plugin_ErrorHandler::EXCEPTION_NO_ROUTE:
            case Zend_Controller_Plugin_ErrorHandler::EXCEPTION_NO_CONTROLLER:
            case Zend_Controller_Plugin_ErrorHandler::EXCEPTION_NO_ACTION:
                $this->getResponse()->setRawHeader('HTTP/1.1 404 Not Found');
                break;
            default:
                $this->getResponse()->setRawHeader('HTTP/1.1 500 Internal Server Error');
                break;
        }
        
        $this->view->exception = $errors->exception;
		$this->view->request = $errors->request;
	}
	
	/**
	 * Display deny page
	 * 
	 * @return void
	 */
	public function denyAction()
	{
		$this->getResponse()->setHttpResponseCode(403);
	}
}