<?php

/**
 * @author Mark van Kleef (mkleef@avans.nl)
 * @copyright Copyright (c) 2015, Avans Hogeschool - All rights reserved
 * @version 1.0.0
 */

class User_Admin_IndexController extends Zend_Controller_Action
{
    const controllerLangKey     = "Gebruikers";
    const indexActionLangKey    = "Overzicht";
    const addActionLangKey      = "Toevoegen";
    const editActionLangKey     = "Bewerken";
    const deleteActionLangKey   = "Verwijderen";

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
		
		$userService = new User_Service_User(new User_Model_Mapper_User());
		$users = $userService->fetchAll();
		
		$usersPaginator = new Zend_Paginator(new Zend_Paginator_Adapter_Array($users));
		$usersPaginator->setCurrentPageNumber($this->getRequest()->getParam('page'));
		$usersPaginator->setItemCountPerPage($settingModel->getSettings('pageCountBack'));
		
		$this->view->users = $usersPaginator;
	}
	
	/**
	 * Display add page
	 *  
	 * @return void
	 */
	public function addAction()
	{
		$userService = new User_Service_User(new User_Model_Mapper_User());
		
		$form = $userService->getForm();
		$flashMessenger = $this->getHelper('flashMessenger')->getMessages();
		$form->populate((isset($flashMessenger[0]['formData'])) ? $flashMessenger[0]['formData'] : array());
		$form->getElement('password')->removeDecorator('description');
		$this->view->form = $form;
		
		if($this->getRequest()->isPost())
		{
			if($form->isValid($this->getRequest()->getPost()))
			{
				try
				{
					$userService->persist($form->getValues());
				
					$this->getHelper('flashMessenger')->addMessage(array('message' => 'Gebruiker succesvol opgeslagen', 'status' => 'success'));
					$this->_redirect($this->view->serverUrl($this->view->url(array(), 'user-admin-index-index')));	
				}
				catch(Exception $e)
				{
					$this->getHelper('flashMessenger')->addMessage(array('message' => 'Er is een fout opgetreden: ' . $e->getMessage(), 'status' => 'error', 'formData' => $form->getValues()));
					$this->_redirect($this->view->serverUrl($this->view->url(array(), 'user-admin-index-add')));
				}
			}
		}
	}
		
	/**
	 * Display edit page
	 * 
	 * @return void
	 */
	public function editAction()
	{
		$userService = new User_Service_User(new User_Model_Mapper_User());
		$user = $userService->fetchById($this->getRequest()->getUserParam('id'));
		
		$form = $userService->getForm();
		$form->getElement('password')->setRequired(false);
		$form->getElement('passwordVerify')->setRequired(false);
		$flashMessenger = $this->getHelper('flashMessenger')->getMessages();
		$form->populate((isset($flashMessenger[0]['formData'])) ? $flashMessenger[0]['formData'] : $user->toArray());
		$this->view->form = $form;
		
		if($this->getRequest()->isPost())
		{
			if($form->isValid($this->getRequest()->getPost()))
			{
				try
				{
					$formData 		= $form->getValues();
					$formData['id'] = $user->getId();
					
					$userService->persist($formData);
					
					$this->getHelper('flashMessenger')->addMessage(array('message' => 'Gebruiker succesvol opgeslagen', 'status' => 'success'));
					$this->_redirect($this->view->serverUrl($this->view->url(array('id' => $user->getId()), 'user-admin-index-edit')));	
				}
				catch(Exception $e)
				{
					$this->getHelper('flashMessenger')->addMessage(array('message' => 'Er is een fout opgetreden: ' . $e->getMessage(), 'status' => 'error', 'formData' => $form->getValues()));
					$this->_redirect($this->view->serverUrl($this->view->url(array('id' => $user->getId()), 'user-admin-index-edit')));
				}
			}
		}
	}
		
	/**
	 * Display delete page
	 * 
	 * @return void
	 */
	public function deleteAction()
	{
		$userService = new User_Service_User(new User_Model_Mapper_User());
		if($userService->delete($this->getRequest()->getUserParam('id')))
		{
			$this->getHelper('flashMessenger')->addMessage(array('message' => 'Gebruiker succesvol verwijderd', 'status' => 'success'));
			$this->_redirect($this->view->serverUrl($this->view->url(array(), 'user-admin-index-index')));
		}
	}
}