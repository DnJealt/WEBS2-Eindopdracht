<?php

/**
 * @author Mark van Kleef (mkleef@avans.nl)
 * @copyright Copyright (c) 2015, Avans Hogeschool - All rights reserved
 * @version 1.0.0
 */

class User_AuthController extends Zend_Controller_Action
{
    const controllerLangKey     = "Authenticatie";
    const loginActionLangKey    = "Inloggen";
    const logoutActionLangKey   = "Uitloggen";

	/**
	 * Display login page
	 *
	 * @return void
	 */
	public function loginAction()
	{
		$this->_helper->layout()->setLayout('admin_login');
		
		$form = new User_Form_Login();
		$this->view->form = $form;
		
		if($this->getRequest()->isPost())
		{
			if($form->isValid($this->getRequest()->getPost()))
			{
				$auth = new Avans_Auth(new Avans_Auth_Adapter_DbTable($form->getValue('username'), $form->getValue('password')));
				if($auth->getResult()->getCode() == Zend_Auth_Result::SUCCESS)
				{
					if(isset($_POST['loggedIn']) && ($_POST['loggedIn'] == 'on' || $_POST['loggedIn'] == 1))
					{
						Zend_Session::rememberMe();
					}
					
					$this->_redirect($this->view->serverUrl($this->view->url(array(), 'default-admin-index-index')));
				}
				elseif($auth->getResult()->getCode() == Zend_Auth_Result::FAILURE_CREDENTIAL_INVALID)
				{
					$this->getHelper('flashMessenger')->addMessage(array('message' => 'Je hebt een verkeerde gebruikersnaam en/of wachtwoord ingevuld.', 'status' => 'error'));
					$this->_redirect($this->view->serverUrl($this->view->url(array(), 'user-auth-login')));
				}
			}
		}
	}
	
	/**
	 * Display logout page
	 * 
	 * @return void
	 */
	public function logoutAction()
	{
		$this->_helper->viewRenderer->setNoRender(true);
		
		if(Avans_Auth::hasIdentity())
		{
			Avans_Auth::clearIdentity();
		}
		
		$this->_redirect($this->view->serverUrl($this->view->url(array(), 'user-auth-login')));
	}
}