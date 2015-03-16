<?php

/**
 * @author Mark van Kleef (mkleef@avans.nl)
 * @copyright Copyright (c) 2015, Avans Hogeschool - All rights reserved
 * @version 1.0.0
 */

class Permission_Model_Mapper_Role extends Avans_Model_Mapper_Abstract implements Permission_Model_Interface_Role
{
	/**
	 * @see Avans_Model_Mapper_Abstract::$_name
	 * @var string
	 */
	protected $_name = 'role';
	
	/**
	 * @see Permission_Model_Interface_Role::persist()
	 * @param Permission_Model_Role $role
	 * @return Permission_Model_Role
	 */
	public function persist(Permission_Model_Role $role)
	{
		$data = array(
			'name'	=> $role->getName()
		);
		
		$db = $this->getAdapter();
		if($role->getId() > 0)
		{
			$db->update($this->getTableName(), $data,
				$db->quoteInto('id = ?', $role->getId())
			);
		}
		else
		{
			$db->insert($this->getTableName(), $data);
		}
		
		return $role;
	}
	
	/**
	 * @see Permission_Model_Interface_Role::delete()
	 * @param Permission_Model_Role $role
	 * @return void
	 */
	public function delete(Permission_Model_Role $role)
	{
		if(!array_key_exists($role->getId(), $role->getReadOnly()))
		{
			$db = $this->getAdapter();
			
			$db->delete($this->getTableName(),
				$db->quoteInto('id = ?', $role->getId())
			);
		}
	}
	
	/**
	 * @see Permission_Model_Interface_Role::fetchById()
	 * @param int $id
	 * @return Permission_Model_Role
	 */
	public function fetchById($id)
	{
		$db = $this->getAdapter();
		
		$row = $db->fetchRow($db->select()->from($this->getTableName())
			->where($db->quoteInto('id = ?', $id))
		);
		
		if($row !== false)
		{
			return $this->_createRole($row);
		}
		
		return array();
	}
	
	/**
	 * @see Permission_Model_Interface_Role::fetchAll()
	 * @param array $options
	 * @return Permission_Model_Role 
	 */
	public function fetchAll(array $options = array())
	{
		$db = $this->getAdapter();
		
		$select = $db->select()->from($this->getTableName());
		
		$rows = $db->fetchAll($select);
		
		if($rows !== false)
		{
			return $this->_createRoles($rows);
		}
		
		return array();
	}
	
	/**
	 * Create roles from an array
	 * 
	 * @param array $rows
	 * @return array
	 */
	protected function _createRoles(array $rows)
	{
		$roles = array();
		foreach($rows as $row)
		{
			$roles[] = $this->_createRole($row);
		}
		
		return $roles;
	}
	
	/**
	 * Create a role from a row
	 * 
	 * @param array $row
	 * @return Permission_Model_Role
	 */
	protected function _createRole(array $row)
	{
		return new Permission_Model_Role(array(
			'id'	=> $row['id'],
			'name'	=> $row['name']
		));
	}
}