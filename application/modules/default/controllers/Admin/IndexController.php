<?php

/**
 * @author Mark van Kleef (mkleef@avans.nl)
 * @copyright Copyright (c) 2015, Avans Hogeschool - All rights reserved
 * @version 1.0.0
 */

class Admin_IndexController extends Zend_Controller_Action
{
    const controllerLangKey             = "Admin";
    const controllerDescriptionLangKey  = '';
    const indexActionLangKey            = "Dashboard";

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
		
	}
}