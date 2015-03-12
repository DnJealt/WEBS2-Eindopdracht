<?php

/**
 * @author Mark van Kleef (mkleef@avans.nl)
 * @copyright Copyright (c) 2015, Avans Hogeschool - All rights reserved
 * @version 1.0.0
 */

class Permission_Admin_RoleController extends Zend_Controller_Action
{
    const controllerLangKey     = "Rolen";
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
		
		$roleService = new Permission_Service_Role(new Permission_Model_Mapper_Role());
		$roles = $roleService->fetchAll();
		
		$rolesPaginator = new Zend_Paginator(new Zend_Paginator_Adapter_Array($roles));
		$rolesPaginator->setCurrentPageNumber($this->getRequest()->getParam('page'));
		$rolesPaginator->setItemCountPerPage($settingModel->getSettings('pageCountBack'));
		
		$this->view->roles = $rolesPaginator;
	}
	
	/**
	 * Display add page
	 * 
	 * @return void
	 */
	public function addAction()
	{
		$roleService = new Permission_Service_Role(new Permission_Model_Mapper_Role());
		
		$form = $roleService->getForm();
		$flashMessenger = $this->getHelper('flashMessenger')->getMessages();
		$form->populate((isset($flashMessenger[0]['formData'])) ? $flashMessenger[0]['formData'] : array());
		$this->view->form = $form;
		
		if($this->getRequest()->isPost())
		{
			if($form->isValid($this->getRequest()->getPost()))
			{
				try
				{
					$roleService->persist($form->getValues());
					
					$this->getHelper('flashMessenger')->addMessage(array('message' => 'Groep succesvol opgeslagen', 'status' => 'success'));
					$this->_redirect($this->view->serverUrl($this->view->url(array(), 'permission-admin-role-index')));	
				}
				catch(Exception $e)
				{
					$this->getHelper('flashMessenger')->addMessage(array('message' => 'Er is een fout opgetreden: ' . $e->getMessage(), 'status' => 'error', 'formData' => $form->getValues()));
					$this->_redirect($this->view->serverUrl($this->view->url(array(), 'permission-admin-role-add')));
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
		$roleService = new Permission_Service_Role(new Permission_Model_Mapper_Role());
		$role = $roleService->fetchById($this->getRequest()->getUserParam('id'));
		
		$form = $roleService->getForm();
		$flashMessenger = $this->getHelper('flashMessenger')->getMessages();
		$form->populate((isset($flashMessenger[0]['formData'])) ? $flashMessenger[0]['formData'] : $role->toArray());
		$this->view->form = $form;
		
		if($this->getRequest()->isPost())
		{
			if($form->isValid($this->getRequest()->getPost()))
			{
				try
				{
					$formData 		= $form->getValues();
					$formData['id'] = $role->getId();
					
					$roleService->persist($formData);
					
					$this->getHelper('flashMessenger')->addMessage(array('message' => 'Groep succesvol opgeslagen', 'status' => 'success'));
					$this->_redirect($this->view->serverUrl($this->view->url(array('id' => $role->getId()), 'permission-admin-role-edit')));	
				}
				catch(Exception $e)
				{
					$this->getHelper('flashMessenger')->addMessage(array('message' => 'Er is een fout opgetreden: ' . $e->getMessage(), 'status' => 'error', 'formData' => $form->getValues()));
					$this->_redirect($this->view->serverUrl($this->view->url(array('id' => $role->getId()), 'permission-admin-role-edit')));
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
		$roleService = new Permission_Service_Role(new Permission_Model_Mapper_Role());
		if($roleService->delete($this->getRequest()->getUserParam('id')))
		{
			$this->getHelper('flashMessenger')->addMessage(array('message' => 'Groep succesvol verwijderd', 'status' => 'success'));
			$this->_redirect($this->view->serverUrl($this->view->url(array(), 'permission-admin-role-index')));	
		}
	}
}