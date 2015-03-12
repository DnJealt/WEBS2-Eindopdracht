<?php

/**
 * @author Mark van Kleef (mkleef@avans.nl)
 * @copyright Copyright (c) 2015, Avans Hogeschool - All rights reserved
 * @version 1.0.0
 */

class Avans_Auth_Adapter_DbTable extends Zend_Auth_Adapter_DbTable
{
	/**
	 * Tablename
	 * 
	 * @var string
	 */
	protected $_tableName = 'user';
	
	/**
	 * Identity column
	 * 
	 * @var string
	 */
	protected $_identityColumn = 'userName';
	
	/**
	 * Credential column
	 * 
	 * @var string
	 */
	protected $_credentialColumn = 'password';
	
	/**
	 * Credential threatment
	 * 
	 * @var string
	 */
	protected $_credentialTreatment = ' ? AND active = "1"';
	
	/**
	 * Constructor
	 * 
	 * @param string $identity
	 * @param string $credential
	 * @return void
	 */
	public function __construct($identity = null, $credential = null)
	{
		$dbAdapter = clone(Zend_Db_Table::getDefaultAdapter());
        $dbAdapter->setFetchMode(Zend_Db::FETCH_ASSOC);
        
        $dbOptions = $dbAdapter->getConfig();
        
		$this->setIdentity($identity);
		$this->setCredential(Avans_Tools_String::hash($credential));
		
		parent::__construct($dbAdapter, $dbOptions['prefix'] . $this->_tableName, $this->_identityColumn, $this->_credentialColumn, $this->_credentialTreatment);
	}
	
	/**
	 * Performs an authentication attempt
	 * 
	 * @return Zend_Auth_Result
	 */
	public function authenticate()
	{
		$result = parent::authenticate();
		if($result->getCode() == 1)
		{
			return new Zend_Auth_Result(Zend_Auth_Result::SUCCESS, '', array('Authentication successful'));
		}
		elseif($result->getCode() == -1)
		{
			return new Zend_Auth_Result(Zend_Auth_Result::FAILURE_CREDENTIAL_INVALID, '', array('Authentication failed'));
		}
		else
		{
			return new Zend_Auth_Result(Zend_Auth_Result::FAILURE_CREDENTIAL_INVALID, '', array('Authentication failed'));	
		}
	}
	
	/**
	 * Get credential column
	 * 
	 * @return string
	 */
	public function getCredentialColumn()
	{
		return $this->_credentialColumn;
	}
}