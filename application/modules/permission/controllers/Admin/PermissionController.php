<?php

/**
 * @author Mark van Kleef (mkleef@avans.nl)
 * @copyright Copyright (c) 2015, Avans Hogeschool - All rights reserved
 * @version 1.0.0
 */

class Permission_Admin_PermissionController extends Zend_Controller_Action
{
    const controllerLangKey = "Rechten";
    const editActionLangKey = "Beheer";

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
	 * Display edit page
	 * 
	 * @return void
	 */
	public function editAction()
	{
		$roleService = new Permission_Service_Role(new Permission_Model_Mapper_Role());
		$role = $roleService->fetchById($this->getRequest()->getUserParam('roleId'));
        $this->view->role = $role;
        $this->view->roles = $roleService->fetchAll();

        $permissionService = new Permission_Service_Permission(new Permission_Model_Mapper_Permission());
        $this->view->permissions = $permissionService->getByRole($role->getId());

        if($this->getRequest()->isPost())
		{
			$permissionService->delete($role->getId());
			$permissionService->persist($this->getRequest()->getPost());
			
			$this->getHelper('flashMessenger')->addMessage(array('message' => 'Permissies succesvol opgeslagen', 'status' => 'success'));
			$this->_redirect($this->view->serverUrl($this->view->url(array('roleId' => $role->getId()), 'permission-admin-permission-edit')));
		}
	}
}