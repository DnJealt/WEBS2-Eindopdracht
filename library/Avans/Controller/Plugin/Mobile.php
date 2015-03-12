<?php

/**
 * @author Mark van Kleef (mkleef@avans.nl)
 * @copyright Copyright (c) 2015, Avans Hogeschool - All rights reserved
 * @version 1.0.0
 */

class Avans_Controller_Plugin_Mobile extends Zend_Controller_Plugin_Abstract
{
	/**
	 * dispatchLoopStartup
	 * 
	 * @param Zend_Controller_Request_Abstract $request
	 * @return void
	 */
	public function dispatchLoopStartup(Zend_Controller_Request_Abstract $request)
	{
		$versionSession	= new Zend_Session_Namespace('version');
		
		$bootstrap 		= Zend_Controller_Front::getInstance()->getParam('bootstrap');
		$userAgent 		= $bootstrap->getResource('useragent');
		
		$params 		= $request->getParams();
		$module 		= $request->getModuleName();
		$controller 	= $request->getControllerName();
		$action 		= $request->getActionName();
		
		if(isset($params['version']) && $params['version'] == 'desktop' && $versionSession->version !== 'desktop')
		{
			$versionSession->version = 'desktop';
			
			header('Location: ' . SITE_URL . $request->getRequestUri());
			exit;
		}
		
		if($userAgent->getDevice()->getType() == 'mobile' && substr($controller, 0, 6) != 'mobile' && $versionSession->version != 'desktop')
		{
			$versionSession->version = 'mobile';
			
			unset($params['module']);
			unset($params['controller']);
			unset($params['action']);
			unset($params['version']);
			
			$redirector = new Zend_Controller_Action_Helper_Redirector();
			$redirector->gotoRouteAndExit($params, $module . '-mobile-' . $controller . '-' . $action);
		}
	}
}