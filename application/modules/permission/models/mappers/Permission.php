<?php

/**
 * @author Mark van Kleef (mkleef@avans.nl)
 * @copyright Copyright (c) 2015, Avans Hogeschool - All rights reserved
 * @version 1.0.0
 */

class Permission_Model_Mapper_Permission extends Avans_Model_Mapper_Abstract implements Permission_Model_Interface_Permission
{
	/**
	 * @see Avans_Model_Mapper_Abstract::$_name
	 * @var string
	 */
	protected $_name = 'resource';

	/**
	 * @see Permission_Model_Interface_Permission::persist()
	 * @param Permission_Model_Permission $permission
	 * @return Permission_Model_Permission
	 */
	public function persist(Permission_Model_Permission $permission)
	{
		$data = array(
			'role'          => $permission->getRole(),
			'resource' 	    => $permission->getResource(),
			'privilege'     => $permission->getPrivilege()
		);

		$db = $this->getAdapter();
		if($permission->getId() > 0)
		{
			$db->update($this->getTableName(), $data,
				$db->quoteInto('id = ?', $permission->getId())
			);
		}
		else
		{
			$db->insert($this->getTableName(), $data);
		}

		return $permission;
	}

	/**
	 * @see Permission_Model_Interface_Permission::delete()
	 * @param Permission_Model_Role $role
	 * @return void
	 */
	public function delete(Permission_Model_Role $role)
	{
		$db = $this->getAdapter();

		$db->delete($this->getTableName(),
			$db->quoteInto('role = ?', $role->getId())
		);
	}

	/**
	 * @see Permission_Model_Interface_Permission::fetchAll()
	 * @param array $options
	 * @return Permission_Model_Permission
	 */
	public function fetchAll(array $options = array())
	{
		$db = $this->getAdapter();

		$select = $db->select()->from($this->getTableName());

		if(isset($options['role']))
		{
			$select->where($db->quoteInto('role = ?', $options['role']));
		}

		$rows = $db->fetchAll($select);

		if($rows !== false)
		{
			return $this->_createPermissions($rows);
		}

		return array();
	}

	/**
	 * Create permissions from an array
	 *
	 * @param array $rows
	 * @return array
	 */
	protected function _createPermissions(array $rows)
	{
		$permissions = array();
		foreach($rows as $row)
		{
			$permissions[] = $this->_createPermission($row);
		}

		return $permissions;
	}

	/**
	 * Create a permission from a row
	 *
	 * @param array $row
	 * @return Permission_Model_Permission
	 */
	protected function _createPermission(array $row)
	{
		return new Permission_Model_Permission(array(
			'id'		=> $row['id'],
			'role'	    => $row['role'],
			'resource'	=> $row['resource'],
			'privilege'	=> $row['privilege']
		));
	}
}