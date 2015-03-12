<?php

/**
 * @author Mark van Kleef (mkleef@avans.nl)
 * @copyright Copyright (c) 2015, Avans Hogeschool - All rights reserved
 * @version 1.0.0
 */

abstract class Avans_Model_Mapper_Abstract extends Avans_Model_Mapper_Cache
{	
	/**
	 * Default db Adapter
	 *
	 * @var Zend_Db_Adapter_Abstract
	 */
	protected static $_defaultAdapter;

	/**
	 * Db adapter
	 *
	 * @var Zend_Db_Adapter_Abstract
	 */
	protected $_adapter;

	/**
	 * Database table name
	 *
	 * @var string
	 */
	protected $_name = null;
	
	/**
	 * Constructor
	 *
	 * @param Zend_Db_Adapter_Abstract $adapter
	 * @throws Avans_Model_Mapper_Exception
	 * @return void
	 */
	public function __construct(Zend_Db_Adapter_Abstract $adapter = null)
	{
		if($adapter === null)
		{
			if(($adapter = self::getDefaultAdapter()) === null)
			{
				throw new Avans_Model_Mapper_Exception('No database adapter defined');
			}
		}

		$this->_adapter = $adapter;
	}

	/**
	 * Set the default adapter
	 *
	 * @param Zend_Db_Adapter_Abstract $adapter
	 * @return void
	 */
	public static function setDefaultAdapter(Zend_Db_Adapter_Abstract $adapter)
	{
		self::$_defaultAdapter = $adapter;
	}

	/**
	 * Get the default adapter
	 *
	 * @return Zend_Db_Adapter_Abstract
	 */
	public function getDefaultAdapter()
	{
		return self::$_defaultAdapter;
	}
	
	/**
	 * Get adapter
	 * 
	 * @return Zend_Db_Adapter_Abstract
	 */
	public function getAdapter()
	{
		return $this->_adapter;
	}
	
	/**
	 * Set tableName
	 * 
	 * @param string $tableName
	 * @return this
	 */
	public function setTableName($tableName = null)
	{
		$this->_name = $tableName;
		return $this;
	}
	
	/**
	 * Get tableName
	 * 
	 * @param string $tableName
	 * @return string
	 */
	public function getTableName($tableName = null)
	{
		$dbOptions = $this->getAdapter()->getConfig();

		if($tableName != null)
		{
			return $dbOptions['prefix'] . $tableName;
		}
		
		return $dbOptions['prefix'] . $this->_name;
	}
}