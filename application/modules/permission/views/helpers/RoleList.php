<?php

/**
 * @author Mark van Kleef (mkleef@avans.nl)
 * @copyright Copyright (c) 2015, Avans Hogeschool - All rights reserved
 * @version 1.0.0
 */

class Permission_View_Helper_RoleList extends Zend_View_Helper_Abstract
{
	/**
	 * Role list
	 * 
	 * @param int $roleId
	 * @return array
	 */
	public function roleList($roleId = null)
	{
		$roleService = new Permission_Service_Role(new Permission_Model_Mapper_Role());
		$roles = $roleService->fetchAll();
		
		$groups = array();
		foreach($roles as $role)
		{
			$groups[$role->getId()] = $role->getName();
		}
		
		if($roleId != null)
		{
			return $groups[$roleId];
		}
		
		return $groups;
	}
}