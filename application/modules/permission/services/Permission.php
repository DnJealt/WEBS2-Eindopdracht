<?php

/**
 * @author Mark van Kleef (mkleef@avans.nl)
 * @copyright Copyright (c) 2015, Avans Hogeschool - All rights reserved
 * @version 1.0.0
 */

class Permission_Service_Permission extends Avans_Service_Abstract
{
	/**
	 * Constructor
	 * 
	 * @param Permission_Model_Interface_Permission $mapper
	 * @return void
	 */
	public function __construct(Permission_Model_Interface_Permission $mapper)
	{
		$this->setMapper($mapper);
	}
	
	/**
	 * @see Permission_Model_Interface_Permission::persist()
	 * @param array $values
	 * @return void
	 */
	public function persist(array $values)
	{
		if(isset($values['permissions']))
		{
			foreach($values['permissions'] as $roleId => $rules)
			{
				foreach($rules as $rule)
				{
					$rule = Zend_Json_Decoder::decode(html_entity_decode($rule));
					
					$permission = new Permission_Model_Permission(array(
						'role'	    => $roleId,
						'resource' 	=> $rule['resource'],
						'privilege' => $rule['privilege']
					));
					
					$this->getMapper()->persist($permission);
				}
			}
		}
	}
	
	/**
	 * @see Permission_Model_Interface_Permission::delete()
	 * @param int $roleId
	 * @return bool
	 */
	public function delete($roleId)
	{
		$roleMapper = new Permission_Model_Mapper_Role();
		$role = $roleMapper->fetchById($roleId);
		
		if($role !== null)
		{
			$this->getMapper()->delete($role);
			
			return true;
		}
		
		return false;
	}
	
	/**
	 * @see Permission_Model_Interface_Permission::fetchAll()
	 * @param array $options
	 * @return Permission_Model_Permission
	 */
	public function fetchAll(array $options = array())
	{
		return $this->getMapper()->fetchAll($options);
	}
	
	/**
	 * Get permissions by role
	 * 
	 * @param int $roleId
	 * @return array
	 */
	public function getByRole($roleId)
	{
		$permissions = array();
		foreach($this->fetchAll(array('roleId' => $roleId))as $permission)
		{
			$permission = $permission -> toArray();
			
			$roleId = $permission['role'];
			
			unset($permission['id']);
			unset($permission['role']);
			
			$permissions[$roleId][] = $permission;
		}
		
		return $permissions;
	}
}