<?php

/**
 * @author Mark van Kleef (mkleef@avans.nl)
 * @copyright Copyright (c) 2015, Avans Hogeschool - All rights reserved
 * @version 1.0.0
 */

class Avans_Filter_Slug implements Zend_Filter_Interface
{
	/**
	 * Delimiter
	 * 
	 * @var string
	 */
	protected $_delimiter = '-';
	
	/**
	 * Constructor
	 * 
	 * @param array $options
	 * @return void
	 */
	public function __construct(array $options = array())
	{
		$this->setOptions($options);
	}
	
	/**
	 * Set options
	 * 
	 * @param array $options
	 * @return void
	 */
	public function setOptions($options)
	{
		if(isset($options['delimiter']))
		{
			$this->setDelimiter($options['delimiter']);
		}
	}
	
	/**
	 * Set delimiter
	 * 
	 * @param string $delimiter
	 * @return this
	 */
	public function setDelimiter($delimiter)
	{
		$this->_delimiter = (string) $delimiter;
		return $this;
	}
	
	/**
	 * Get delimiter
	 * 
	 * @return string
	 */
	public function getDelimiter()
	{
		return $this->_delimiter;
	}
	
	/**
	 * @see Zend_Filter_Interface
	 * @param string $value
	 * @return string
	 */
	public function filter($value)
	{
		$value = iconv('UTF-8', 'ASCII//TRANSLIT', $value);
        //$value = iconv('ISO-8859-1', 'ASCII//TRANSLIT', $value);
	    $value = preg_replace("/[^a-zA-Z0-9\/_| -]/", '', $value);
	    $value = strtolower(trim($value, $this->getDelimiter()));
	    $value = preg_replace("/[\/_| -]+/", $this->getDelimiter(), $value);
	    
	    return $value; 
	}
}