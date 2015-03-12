<?php

/**
 * @author Mark van Kleef (mkleef@avans.nl)
 * @copyright Copyright (c) 2015, Avans Hogeschool - All rights reserved
 * @version 1.0.0
 */

class Avans_Acl extends Zend_Acl
{
	/**
	 * Constructor
	 * 
	 * @return void
	 */
	public function __construct()
	{
		$this->initRoles();
		$this->initResources();
	}
	
	/**
	 * Initialize roles
	 * 
	 * @return void
	 */
	protected function initRoles()
	{
		$roleService = new Permission_Service_Role(new Permission_Model_Mapper_Role());
		
		foreach($roleService->fetchAll() as $role)
		{
			$roleId = (string) $role->getId();
			
			if(!$this->hasRole($roleId))
			{
				$this->addRole($roleId);	
			}
		}
	}
	
	/**
	 * Initialize resources
	 * 
	 * @return void
	 */
	protected function initResources()
	{
		$permissionService = new Permission_Service_Permission(new Permission_Model_Mapper_Permission());
		
		foreach($permissionService->fetchAll() as $permission)
		{
			$resource = $permission->getResource();
			
			if(!$this->has($resource))
			{
				$this->addResource($resource);
			}
			
			$this->initRules($permission);
		}
	}
	
	/**
	 * Initialize rules
	 * 
	 * @param object $permission
	 * @return void
	 */
	protected function initRules($permission)
	{
		$resource = $permission->getResource();
		
		if($this->has($resource))
		{
			$this->allow((string) $permission->getRole(), $resource, $permission->getPrivilege());
		}
	}
}