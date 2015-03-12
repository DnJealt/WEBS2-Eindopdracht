<?php

/**
 * @author Mark van Kleef (mkleef@avans.nl)
 * @copyright Copyright (c) 2015, Avans Hogeschool - All rights reserved
 * @version 1.0.0
 */

class User_Service_User extends Avans_Service_Abstract
{
	/**
	 * Constructor
	 * 
	 * @param User_Model_Interface_User $mapper
	 * @return void
	 */
	public function __construct(User_Model_Interface_User $mapper)
	{
		$this->setMapper($mapper);
	}
	
	/**
	 * @see User_Model_Interface_User::persist()
	 * @param array $values
	 * @return void
	 */
	public function persist(array $values)
	{
		$data = array(
			'id'		=> (isset($values['id'])) ? $values['id'] : 0,
			'roleId'	=> $values['roleId'],
			'username'	=> $values['username'],
			'email'		=> $values['email'],
			'status'	=> $values['status'],
			'color'		=> (isset($values['color'])) ? $values['color'] : ''
		);
		
		if($values['password'] != '')
		{
			$data['password'] = $values['password'];
		}
		
		$this->getMapper()->persist(new User_Model_User($data));
	}
	
	/**
	 * @see User_Model_Interface_User::delete()
	 * @param int $id
	 * @return bool
	 */
	public function delete($id)
	{
		$user = $this->getMapper()->fetchById($id);
		
		if($user !== null)
		{
			$this->getMapper()->delete($user);
			
			return true;
		}
		
		return false;
	}
	
	/**
	 * @see User_Model_Interface_User::fetchById()
	 * @param int $id
	 * @return User_Model_User
	 */
	public function fetchById($id)
	{
		return $this->getMapper()->fetchById($id);
	}
	
	/**
	 * @see User_Model_Interface_User::fetchAll()
	 * @param array $options
	 * @return User_Model_User
	 */
	public function fetchAll(array $options = array())
	{
		return $this->getMapper()->fetchAll($options);
	}
	
	/**
	 * Get form
	 * 
	 * @return User_Form_User
	 */
	public function getForm()
	{
		if($this->_form === null)
		{
			$this->_form = new User_Form_User();
		}
		
		return $this->_form;
	}
}