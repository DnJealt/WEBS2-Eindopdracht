<?php

/**
 * @author Mark van Kleef (mkleef@avans.nl)
 * @copyright Copyright (c) 2015, Avans Hogeschool - All rights reserved
 * @version 1.0.0
 */

class Page_IndexController extends Zend_Controller_Action
{
    const controllerLangKey     = "Informatie";
    const indexActionLangKey    = "Detailpagina";

	/**
	 * Display index page
	 * 
	 * @return void
	 */
	public function indexAction()
	{
		$pageSlug = $this->getRequest()->getUserParam('page');
		
		$pageService = new Page_Service_Page(new Page_Model_Mapper_Page());
		$page = $pageService->fetchBySlug($pageSlug);
		$this->view->page = $page;
		
		if($page == false || $page->getStatus() == 0)
		{
			throw new Zend_Controller_Action_Exception('The page with slug "' . $pageSlug . '" does not exists', 404);
		}
	}
}