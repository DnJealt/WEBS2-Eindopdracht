<?php

/**
 * @author Mark van Kleef (mkleef@avans.nl)
 * @copyright Copyright (c) 2015, Avans Hogeschool - All rights reserved
 * @version 1.0.0
 */

interface Permission_Model_Interface_Permission
{
	/**
	 * Persist permission
	 * 
	 * @param Permission_Model_Permission $permission
	 * @return Permission_Model_Permission
	 */
	public function persist(Permission_Model_Permission $permission);
	
	/**
	 * Delete permissions
	 * 
	 * @param Permission_Model_Role $role
	 * @return void
	 */
	public function delete(Permission_Model_Role $role);
	
	/**
	 * Fetch all permissions
	 * 
	 * @param array $options
	 * @return array (Permission_Model_Permission)
	 */
	public function fetchAll(array $options = array());
}