<?php

/**
 * @author Mark van Kleef (mkleef@avans.nl)
 * @copyright Copyright (c) 2015, Avans Hogeschool - All rights reserved
 * @version 1.0.0
 */

class Page_View_Helper_PageColumnItemsList extends Zend_View_Helper_Abstract
{
	/**
	 * Column list
	 * 
	 * @param int $column
	 * @return string
	 */
	public function pageColumnItemsList($column = null)
	{
		$pageService = new Page_Service_Page(new Page_Model_Mapper_Page());
		$pages = $pageService->fetchByColumn($column);
		
		$items = '';
		foreach($pages as $page)
		{
        	$items .= '<li><a href="' . $this->view->escape($page->getUrl()) . '">' . $this->view->escape($page->getName()) . '</a></li>' . PHP_EOL;
		}
		
		return $items;
	}
}