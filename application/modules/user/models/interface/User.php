<?php

/**
 * @author Mark van Kleef (mkleef@avans.nl)
 * @copyright Copyright (c) 2015, Avans Hogeschool - All rights reserved
 * @version 1.0.0
 */

interface User_Model_Interface_User
{
	/**
	 * Persist user
	 * 
	 * @param User_Model_User $user
	 * @return User_Model_User
	 */
	public function persist(User_Model_User $user);
	
	/**
	 * Delete user
	 * 
	 * @param User_Model_User $user
	 * @return void
	 */
	public function delete(User_Model_User $user);
	
	/**
	 * Fetch user by id
	 * 
	 * @param int $id
	 * @return User_Model_User
	 */
	public function fetchById($id);

	/**
	 * Fetch all users
	 * 
	 * @param array $options
	 * @return array (User_Model_User)
	 */
	public function fetchAll(array $options = array());
}