<?php

/**
 * @author Mark van Kleef (mkleef@avans.nl)
 * @copyright Copyright (c) 2015, Avans Hogeschool - All rights reserved
 * @version 1.0.0
 */

class Model_Mapper_Setting extends Avans_Model_Mapper_Abstract implements Model_Interface_Setting
{
	/**
	 * @see Avans_Model_Mapper_Abstract::$_name
	 * @var string
	 */	
	protected $_name = 'config';
	
	/**
	 * @see Model_Interface_Setting::updateSetting()
	 * @param string $key
	 * @param string $value
	 * @return void
	 */
	public function updateSetting($key, $value)
	{
		$db = $this->getAdapter();
		
		$db->update($this->getTableName(), 
			array(
				'configValue' => $value
			),
			$db->quoteInto('configKey = ?', $key)
		);
	}
	
	/**
	 * @see Model_Interface_Setting::fetchByKey()
	 * @param string $key
	 * @return mixed
	 */
	public function fetchByKey($key)
	{
		$db = $this->getAdapter();
		
		$select = $db->select()->from($this->getTableName(), array('configValue'))
			->where($db->quoteInto('configKey = ?', $key));
			
		$row = $db->fetchRow($select);
		
		if($row !== false)
		{
			return $row['configValue'];
		}
		
		return null;
	}
	
	/**
	 * @see Model_Interface_Setting::fetchAll()
	 * @param array $options
	 * @return array
	 */
	public function fetchAll(array $options = array())
	{
		$db = $this->getAdapter();
		
		$select = $db->select()->from($this->getTableName());
		
		$rows = $db->fetchAll($select);
		
		if($rows !== false)
		{
			return $rows;
		}
		
		return array();
	}
}