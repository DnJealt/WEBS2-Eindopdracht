<?php

/**
 * @author Mark van Kleef (mkleef@avans.nl)
 * @copyright Copyright (c) 2015, Avans Hogeschool - All rights reserved
 * @version 1.0.0
 */

class Avans_Controller_Plugin_Auth extends Zend_Controller_Plugin_Abstract
{
	/**
	* preDispatch
	*
	* @param Zend_Controller_Request_Abstract $request
	* @return void
	*/
	public function preDispatch(Zend_Controller_Request_Abstract $request)
	{
		$resource = $request->getModuleName() . '_' . $request->getControllerName();
        
	    $isLoggedIn = Avans_Auth::hasIdentity();
		$roleId = $isLoggedIn ? Avans_Auth::getIdentity()->role : 3;
		
		$acl = new Avans_Acl();

	    if($acl->has($resource) && $acl->isAllowed($roleId, $resource, $request->getActionName()))
        {
        	return;
        }
        
      	$request->setModuleName($isLoggedIn ? 'default' : 'user')
				->setControllerName($isLoggedIn ? 'error' : 'auth')
				->setActionName($isLoggedIn ? 'deny' : 'login');
	}
}