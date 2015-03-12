<?php

/**
 * @author Mark van Kleef (mkleef@avans.nl)
 * @copyright Copyright (c) 2015, Avans Hogeschool - All rights reserved
 * @version 1.0.0
 */

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
	/**
	 * Setup a resource loader for the default module
	 *
	 * @return void
	 */
	protected function _initDefaultResourceLoader()
	{
		$resourceLoader = new Zend_Application_Module_Autoloader(
			array(
				'namespace'	=> '',
				'basePath'	=> APPLICATION_PATH . '/modules/default',
   			)
		);
		
		$resourceLoader->addResourceType('interface', 'models/interface', 'Model_Interface')
					   ->addResourceType('service', 'service/', 'Service_');
	}

	/**
	 * Setup data mapper
	 *
	 * @return void
	 */
	protected function _initDataMapper()
	{
		$this->bootstrap('multidb');
		
		Avans_Model_Mapper_Abstract::setDefaultAdapter($this->getPluginResource('multidb')->getDb('default'));
	}
	
	/**
	 * Setup HTTP response
	 *
	 * @return Zend_Controller_Response_Http
	 */
	protected function _initHttpResponse()
	{
		$response = new Zend_Controller_Response_Http();
		$response->setHeader('language', 'en')
				 ->setHeader('content-language', 'en')
				 ->setHeader('Content-Type', 'text/html; charset=utf-8');

		$this->getPluginResource('frontController')->getFrontController()->setResponse($response);

		return $response;
	}

	/**
	 * Setup view environment
	 *
	 * @return Zend_View
	 */
	protected function _initViewEnvironment()
	{
		$view = $this->getPluginResource('view')->getView();
		$view->doctype(Zend_View_Helper_Doctype::XHTML5);
		$view->setEncoding('utf-8');
		$view->headMeta('', 'utf-8', 'charset');
		
		Zend_Layout::startMvc(
			array(
				'layout' 		=> 'layout',
				'layoutPath' 	=> APPLICATION_PATH . '/template/layout',	
				'contentKey' 	=> 'content'
			)
		);
	}
	
	/**
	 * Setup locale
	 *
	 * @return void
	 */
	protected function _initSystemLocale()
	{
		$this->bootstrap('locale');

		setlocale(LC_CTYPE, $this->getResource('locale')->toString() . '.utf-8');
	}
	
	/**
	 * Setup module config
	 * 
	 * @return void
	 */
	protected function _initModuleConfig()
	{
		$bootstrap = $this->bootstrap('frontController');
		
		foreach(Avans_Module::getInstance()->getModules() as $module)
		{
            $this->getPluginResource('view')->getView()->addHelperPath(dirname($module->getModuleDir()) . '/views/helpers', ucfirst($module->getModuleName()) . '_View_Helper');
			
			if(file_exists($moduleDirConfig = dirname($module->getModuleDir()) . '/config/config.php'))
			{
				$moduleConfig = include_once $moduleDirConfig;
				$bootstrap->setOptions(array($module->getModuleName() => $moduleConfig));
			}
		}
	}
	
	/**
	 * Setup ZendX view helper
	 * 
	 * @return void 
	 */
	protected function _initViewHelpers()
	{
		$view = new Zend_View();
		$viewRenderer = new Zend_Controller_Action_Helper_ViewRenderer();
		
		$view->addHelperPath('ZendX/JQuery/View/Helper/', 'ZendX_JQuery_View_Helper');
		$viewRenderer->setView($view);
		Zend_Controller_Action_Helperbroker::addHelper($viewRenderer);
	}
}