<?php

/**
 * @author Mark van Kleef (mkleef@avans.nl)
 * @copyright Copyright (c) 2015, Avans Hogeschool - All rights reserved
 * @version 1.0.0
 */

abstract class Avans_Service_Abstract
{
	/**
	 * Form
	 * 
	 * @var object
	 */
	protected $_form;
	
	/**
	 * Datamapper
	 * 
	 * @var object
	 */
	protected $_mapper;
	
	/**
	 * Set datamapper
	 * 
	 * @return this
	 */
	public function setMapper($mapper)
	{
		$this->_mapper = $mapper;
		return $this;
	}
	
	/**
	 * Get datamapper
	 * 
	 * @return object
	 */
	public function getMapper()
	{
		return $this->_mapper;
	}
}