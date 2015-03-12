<?php

/**
 * @author Mark van Kleef (mkleef@avans.nl)
 * @copyright Copyright (c) 2015, Avans Hogeschool - All rights reserved
 * @version 1.0.0
 */

class User_Model_User extends Avans_Model_Abstract
{
	/**
	 * Readonly users
	 * 
	 * @var array
	 */
	protected $_readOnly = array(1 => 'Administrator', 3 => 'Gast');
	
	/**
	 * Vars
	 */
	protected $_id;
	protected $_roleId;
	protected $_username;
	protected $_password;
	protected $_email;
	protected $_status;
	protected $_color;
	
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
	public function setRoleId($roleId)
	{
		$this->_roleId = $roleId;
		return $this;
	}
	
	/**
	 * Get roleId
	 * 
	 * @return int
	 */
	public function getRoleId()
	{
		return $this->_roleId;
	}
	
	/**
	 * Set username
	 * 
	 * @param string $username
	 * @return this
	 */
	public function setUsername($username)
	{
		$this->_username = $username;
		return $this;
	}
	
	/**
	 * Get username
	 * 
	 * @return string
	 */
	public function getUsername()
	{
		return $this->_username;
	}
		
	/**
	 * Set password
	 * 
	 * @param string $password
	 * @return this
	 */
	public function setPassword($password)
	{
		$this->_password = Avans_Tools_String::hash($password);
		return $this;
	}
	
	/**
	 * Get password
	 * 
	 * @return string
	 */
	public function getPassword()
	{
		return $this->_password;
	}
	
	/**
	 * Set username
	 * 
	 * @param string $email
	 * @return this
	 */
	public function setEmail($email)
	{
		$this->_email = $email;
		return $this;
	}
	
	/**
	 * Get email
	 * 
	 * @return string
	 */
	public function getEmail()
	{
		return $this->_email;
	}
	
	/**
	 * Set status
	 * 
	 * @param int $status
	 * @return this
	 */
	public function setStatus($status)
	{
		$this->_status = $status;
		return $this;
	}
	
	/**
	 * Get status
	 * 
	 * @return int
	 */
	public function getStatus()
	{
		return $this->_status;
	}
	
	/**
	 * Get read only users
	 * 
	 * @var array
	 */
	public function getReadOnly()
	{
		return $this->_readOnly;
	}
	
	/**
	 * Set color
	 * 
	 * @param string $color
	 * @return this
	 */
	public function setColor($color)
	{
		$this->_color = $color;
		return $this;
	}
	
	/**
	 * Get color
	 * 
	 * @return string
	 */
	public function getColor()
	{
		return $this->_color;
	}
}