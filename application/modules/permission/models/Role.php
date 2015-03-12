<?php

/**
 * @author Mark van Kleef (mkleef@avans.nl)
 * @copyright Copyright (c) 2015, Avans Hogeschool - All rights reserved
 * @version 1.0.0
 */

class Permission_Model_Role extends Avans_Model_Abstract
{
	/**
	 * Read only roles
	 * 
	 * @var array
	 */
	protected $_readOnly = array(1 => 'Administrator', 2 => 'Beheerder', 3 => 'Gast');
	
	/**
	 * Vars
	 */
	protected $_id;
	protected $_name;
	
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
	 * Set name
	 * 
	 * @param string $name
	 * @return this
	 */
	public function setName($name)
	{
		$this->_name = $name;
		return $this;
	}
	
	/**
	 * Get name
	 * 
	 * @return string
	 */
	public function getName()
	{
		return $this->_name;
	}
	
	/**
	 * Get read only roles
	 * 
	 * @return array
	 */
	public function getReadOnly()
	{
		return $this->_readOnly;
	}
}