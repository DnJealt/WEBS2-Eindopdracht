<?php

/**
 * @author Mark van Kleef (mkleef@avans.nl)
 * @copyright Copyright (c) 2015, Avans Hogeschool - All rights reserved
 * @version 1.0.0
 */

class Admin_SettingController extends Zend_Controller_Action
{
    const controllerLangKey             = 'Instellingen';
    const controllerDescriptionLangKey  = 'Hier worden de instellingen van de site beheerd';
    const indexActionLangKey            = 'Beheer';

	/**
	 * Initialize
	 * 
	 * @return void
	 */
	public function init()
	{
		$this->getHelper('layout')->setLayout('admin');
	}
	
	/**
	 * Display index page
	 * 
	 * @return void
	 */
	public function indexAction()
	{
		$settingModel = new Model_Setting();
		
		$form = new Form_Setting();
		$form->populate($settingModel->getSettings());
		$this->view->form = $form;
		
		if($this->getRequest()->isPost())
		{
			if($form->isValid($this->getRequest()->getPost()))
			{
				$settingModel->updateSettings($this->getRequest()->getPost());
				
				$this->getHelper('flashMessenger')->addMessage(array('message' => 'Instellingen succesvol opgeslagen', 'status' => 'success'));
				$this->_redirect($this->view->serverUrl($this->view->url(array(), 'default-admin-setting-index')));
			}
		}
	}
}