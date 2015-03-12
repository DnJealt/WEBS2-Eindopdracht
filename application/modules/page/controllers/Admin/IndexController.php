<?php

/**
 * @author Mark van Kleef (mkleef@avans.nl)
 * @copyright Copyright (c) 2015, Avans Hogeschool - All rights reserved
 * @version 1.0.0
 */

class Page_Admin_IndexController extends Zend_Controller_Action
{
    const controllerLangKey     = "Beheer";
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
		
		$pageService = new Page_Service_Page(new Page_Model_Mapper_Page());
		$pages = $pageService->fetchAll();
		
		$pagesPaginator = new Zend_Paginator(new Zend_Paginator_Adapter_Array($pages));
		$pagesPaginator->setCurrentPageNumber($this->getRequest()->getParam('page'));
		$pagesPaginator->setItemCountPerPage($settingModel->getSettings('pageCount'));
		
		$this->view->pages = $pagesPaginator;
	}
	
	/**
	 * Display add page
	 * 
	 * @return void
	 */
	public function addAction()
	{
		$pageService = new Page_Service_Page(new Page_Model_Mapper_Page());
		
		$form = $pageService->getForm();
		$flashMessenger = $this->getHelper('flashMessenger')->getMessages();
		$form->populate((isset($flashMessenger[0]['formData'])) ? $flashMessenger[0]['formData'] : array());
		$this->view->form = $form;
		
		if($this->getRequest()->isPost())
		{
			if($form->isValid($this->getRequest()->getPost()))
			{
				try
				{
					$pageService->persist($form->getValues());
					
					$this->getHelper('flashMessenger')->addMessage(array('message' => 'Pagina succesvol opgeslagen', 'status' => 'success'));
					$this->_redirect($this->view->serverUrl($this->view->url(array(), 'page-admin-index-index')));	
				}
				catch(Exception $e)
				{
					$this->getHelper('flashMessenger')->addMessage(array('message' => 'Er is een fout opgetreden: ' . $e->getMessage(), 'status' => 'error', 'formData' => $form->getValues()));
					$this->_redirect($this->view->serverUrl($this->view->url(array(), 'page-admin-index-add')));
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
		$pageService = new Page_Service_Page(new Page_Model_Mapper_Page());
		$page = $pageService->fetchById($this->getRequest()->getUserParam('id'));
		
		$form = $pageService->getForm();
		$flashMessenger = $this->getHelper('flashMessenger')->getMessages();
		$form->populate((isset($flashMessenger[0]['formData'])) ? $flashMessenger[0]['formData'] : $page->toArray());
		$this->view->form = $form;
		
		if($this->getRequest()->isPost())
		{
			if($form->isValid($this->getRequest()->getPost()))
			{
				try
				{
					$formData 		= $form->getValues();
					$formData['id'] = $page->getId();
					
					$pageService->persist($formData);
					
					$this->getHelper('flashMessenger')->addMessage(array('message' => 'Pagina succesvol opgeslagen', 'status' => 'success'));
					$this->_redirect($this->view->serverUrl($this->view->url(array('id' => $page->getId()), 'page-admin-index-edit')));	
				}
				catch(Exception $e)
				{
					$this->getHelper('flashMessenger')->addMessage(array('message' => 'Er is een fout opgetreden: ' . $e->getMessage(), 'status' => 'error', 'formData' => $form->getValues()));
					$this->_redirect($this->view->serverUrl($this->view->url(array('id' => $page->getId()), 'page-admin-index-edit')));
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
		$pageService = new Page_Service_Page(new Page_Model_Mapper_Page());
		if($pageService->delete($this->getRequest()->getUserParam('id')))
		{
			$this->getHelper('flashMessenger')->addMessage(array('message' => 'Pagina succesvol verwijderd', 'status' => 'success'));
			$this->_redirect($this->view->serverUrl($this->view->url(array(), 'page-admin-index-index')));
		}
	}
}