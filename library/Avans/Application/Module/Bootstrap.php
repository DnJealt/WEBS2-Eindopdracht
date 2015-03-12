<?php

/**
 * @author Mark van Kleef (mkleef@avans.nl)
 * @copyright Copyright (c) 2015, Avans Hogeschool - All rights reserved
 * @version 1.0.0
 */

abstract class Avans_Application_Module_Bootstrap extends Zend_Application_Module_Bootstrap
{
	/**
	 * Configuration data
	 * 
	 * @var Zend_Config
	 */
	protected $_config;
	
	/**
	 * Constructor
	 * 
	 * @param Zend_Application $application
	 * @return void
	 */
	public function __construct($application)
	{
		parent::__construct($application);
		
		$resourceLoader = $this->getResourceLoader();
		$resourceLoader->addResourceType('interface', 'models/interface', 'Model_Interface');
		
		$this->_config = new Zend_Config($this->getOptions());
	}
	
	/**
	 * Setup the router configuration
	 * 
	 * @return void
	 */
	public function _initRoutes()
	{
		if(isset($this->_config->resources->router->routes))
		{
			$router = $this->getApplication()->getPluginResource('router')->getRouter();
			$router->addConfig($this->_config->resources->router->routes);
		}
	}
}