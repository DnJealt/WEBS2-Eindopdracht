<?php

/**
 * @author Mark van Kleef (mkleef@avans.nl)
 * @copyright Copyright (c) 2015, Avans Hogeschool - All rights reserved
 * @version 1.0.0
 */

class Permission_Model_Permission extends Avans_Model_Abstract
{
	/**
	 * Vars
	 */
	protected $_id;
	protected $_role;
	protected $_resource;
	protected $_privilege;
	
	/**
	 * Set id
	 * 
	 * @param int $id
	 * @return this
	 */
	public function setId($id)
	{
		$this->_id = $id;
		return $this;
	}
	
	/**
	 * Get id
	 * 
	 * @return int
	 */
	public function getId()
	{
		return $this->_id;
	}
	
	/**
	 * Set roleId
	 * 
	 * @param int $roleId
	 * @return this
	 */
	public function setRole($role)
	{
		$this->_role = $role;
		return $this;
	}
	
	/**
	 * Get roleId
	 * 
	 * @return int
	 */
	public function getRole()
	{
		return $this->_role;
	}
	
	/**
	 * Set resource
	 * 
	 * @param string $resource
	 * @return this
	 */
	public function setResource($resource)
	{
		$this->_resource = $resource;
		return $this;
	}
	
	/**
	 * Get resource
	 * 
	 * @return string
	 */
	public function getResource()
	{
		return $this->_resource;
	}
	
	/**
	 * Set privilege
	 * 
	 * @param string $privilege
	 * @return this
	 */
	public function setPrivilege($privilege)
	{
		$this->_privilege = $privilege;
		return $this;
	}
	
	/**
	 * Get privilege
	 * 
	 * @return string
	 */
	public function getPrivilege()
	{
		return $this->_privilege;
	}
}