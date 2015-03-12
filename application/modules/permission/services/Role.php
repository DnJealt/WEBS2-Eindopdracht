<?php

/**
 * @author Mark van Kleef (mkleef@avans.nl)
 * @copyright Copyright (c) 2015, Avans Hogeschool - All rights reserved
 * @version 1.0.0
 */

class Permission_Service_Role extends Avans_Service_Abstract
{
	/**
	 * Constructor
	 * 
	 * @param Permission_Model_Interface_Role $mapper
	 * @return void
	 */
	public function __construct(Permission_Model_Interface_Role $mapper)
	{
		$this->setMapper($mapper);
	}
	
	/**
	 * @see Permission_Model_Interface_Role::persist()
	 * @param array $values
	 * @return void
	 */
	public function persist(array $values)
	{
		$role = new Permission_Model_Role(array(
			'id'	=> (isset($values['id'])) ? $values['id'] : 0,
			'name'	=> $values['name']
		));
		
		$this->getMapper()->persist($role);
	}
	
	/**
	 * @see Permission_Model_Interface_Role::delete()
	 * @param int $id
	 * @return bool
	 */
	public function delete($id)
	{
		$role = $this->getMapper()->fetchById($id);
		
		if($role !== null)
		{
			$this->getMapper()->delete($role);
			
			return true;
		}
		
		return false;
	}
	
	/**
	 * @see Permission_Model_Interface_Role::fetchById()
	 * @param int $id
	 * @return Permission_Model_Role
	 */
	public function fetchById($id)
	{
		return $this->getMapper()->fetchById($id);
	}
	
	/**
	 * @see Permission_Model_Interface_Role::fetchAll()
	 * @param array $options
	 * @return Permission_Model_Role
	 */
	public function fetchAll(array $options = array())
	{
		return $this->getMapper()->fetchAll($options);
	}

	/**
	 * Get form
	 * 
	 * @return Permission_Form_Role
	 */
	public function getForm()
	{
		if($this->_form === null)
		{
			$this->_form = new Permission_Form_Role();
		}
		
		return $this->_form;
	}
}