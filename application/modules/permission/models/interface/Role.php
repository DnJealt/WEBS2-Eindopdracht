<?php

/**
 * @author Mark van Kleef (mkleef@avans.nl)
 * @copyright Copyright (c) 2015, Avans Hogeschool - All rights reserved
 * @version 1.0.0
 */

interface Permission_Model_Interface_Role
{
	/**
	 * Persist role
	 * 
	 * @param Permission_Model_Role $role
	 * @return Permission_Model_Role
	 */
	public function persist(Permission_Model_Role $role);
	
	/**
	 * Delete role
	 * 
	 * @param Permission_Model_Role $role
	 * @return void
	 */
	public function delete(Permission_Model_Role $role);
	
	/**
	 * Fetch role by id
	 * 
	 * @param int $id
	 * @return Permission_Model_Role
	 */
	public function fetchById($id);

	/**
	 * Fetch all roles
	 * 
	 * @param array $options
	 * @return array (Permission_Model_Role)
	 */
	public function fetchAll(array $options = array());
}