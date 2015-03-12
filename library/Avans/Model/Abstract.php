<?php

/**
 * @author Mark van Kleef (mkleef@avans.nl)
 * @copyright Copyright (c) 2015, Avans Hogeschool - All rights reserved
 * @version 1.0.0
 */

abstract class Avans_Model_Abstract
{
	/**
	 * Constructor
	 * 
	 * @param array $values
	 * @return void
	 */
	public function __construct(array $values)
	{
		$this->setValues($values);
	}
	
	/**
	 * Set values
	 * 
	 * @param array $values
	 * @return void
	 */
	public function setValues(array $values)
	{
		if(is_array($values) && count($values) > 0)
		{
			foreach($values as $key => $value)
			{
				$this->setValue($key, $value);
			}
		}
	}
	
	/**
	 * Set value
	 * 
	 * @param string $key
	 * @param string $value
	 * @throws Avans_Model_Exception
	 * @return void
	 */
	public function setValue($key, $value)
	{
		$method = 'set' . self::toCamelCase($key);		
		if(method_exists($this, $method))
		{
			$this->{$method}($value);
		}
		else
		{
			throw new Avans_Model_Exception('Method with name "' . $method . '" does not exists');
		}
	}
	
	/**
	 * Convert object to an array
	 * 
	 * @return array
	 */
	public function toArray()
	{
		$data = array();
		foreach($this as $key => $value)
		{
			$method = 'get' . self::toCamelCase($key);
			
			$data[self::toCamelCase($key, false)] = $this->$method();
		}
		
		return $data;
	}
	
	/**
	 * Convert a string to camelCase
	 * 
	 * @param string $value
	 * @param bool $ucfirst
	 * @return string
	 */
	private static function toCamelCase($value, $ucfirst = true)
	{
		// Fix for < PHP 5.3
		if(!function_exists('lcfirst'))
		{
			function lcfirst($str)
    		{ 
    			return (string)(strtolower(substr($str, 0, 1)) . substr($str, 1));
    		}
		}
		
		return implode('', array_map(($ucfirst) ? 'ucfirst' : 'lcfirst', explode('_', $value)));
	}
}