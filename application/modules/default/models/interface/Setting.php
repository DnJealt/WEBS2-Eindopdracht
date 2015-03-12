<?php

/**
 * @author Mark van Kleef (mkleef@avans.nl)
 * @copyright Copyright (c) 2015, Avans Hogeschool - All rights reserved
 * @version 1.0.0
 */

interface Model_Interface_Setting
{
	/**
	 * Update setting
	 * 
	 * @param string $key
	 * @param string $value
	 * @return void
	 */
	public function updateSetting($key, $value);
	
	/**
	 * Fetch by key
	 * 
	 * @param string $key
	 * @return mixed
	 */
	public function fetchByKey($key);

	/**
	 * Fetchall
	 * 
	 * @param array $options
	 * @return array
	 */
	public function fetchAll(array $options = array());		
}