<?php

/**
 * @author Mark van Kleef (mkleef@avans.nl)
 * @copyright Copyright (c) 2015, Avans Hogeschool - All rights reserved
 * @version 1.0.0
 */

class Avans_Auth
{
	/**
	 * Zend Auth
	 * 
	 * @object Zend_Auth
	 */
	protected static $_zendAuth;
	
	/**
	 * Result
	 * 
	 * @object Zend_Auth_Result
	 */
	protected $_result;
	
	/**
	 * Constructor
	 * 
	 * @param Zend_Auth_Adapter_Interface $adapter
	 * @return void
	 */
	public function __construct(Zend_Auth_Adapter_Interface $adapter)
	{
		$result = self::instance()->authenticate($adapter);
		
		if($result->isValid())
		{
			if($adapter instanceof Avans_Auth_Adapter_DbTable)
			{
				self::instance()->getStorage()->write($adapter->getResultRowObject(null, $adapter->getCredentialColumn()));
			}
		}
		
		$this->_result = $result;
	}
	
	/**
	 * Get instance
	 * 
	 * @return Zend_Auth
	 */
	protected static function instance()
	{
		if(!self::$_zendAuth instanceof Zend_Auth)
		{
			self::$_zendAuth = Zend_Auth::getInstance();	
		}
		
		return self::$_zendAuth;
	}
	
	/**
	 * Get result
	 * 
	 * @return Zend_Auth_Result
	 */
	public function getResult()
	{
		return $this->_result;
	}
	
	/**
	 * Returns true if and only if an identity is available from storage
	 * 
	 * @return bool
	 */
	public static function hasIdentity()
	{
		return self::instance()->hasIdentity();
	}
	
	/**
	 * Returns the identity from storage or null if no identity is available
	 * 
	 * @return mixed
	 */
	public static function getIdentity()
	{
		return self::instance()->getIdentity();
	}
	
	/**
	 * Clears the identity from persistent storage
	 * 
	 * @return void
	 */
	public static function clearIdentity()
	{
		self::instance()->clearIdentity();
		Zend_Session::forgetMe();
	}
}