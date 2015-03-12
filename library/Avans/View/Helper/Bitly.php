<?php

/**
 * @author Mark van Kleef (mkleef@avans.nl)
 * @copyright Copyright (c) 2015, Avans Hogeschool - All rights reserved
 * @version 1.0.0
 */

class Avans_View_Helper_Bitly extends Zend_View_Helper_Abstract
{
	/**
	 * Bitly settings
	 * 
	 * @var array
	 */
	protected $_bitlySettings;
	
	/**
	 * Bitly
	 * 
	 * @return string
	 */
	public function bitly($bitlySettings)
	{
		$this->_bitlySettings = $bitlySettings;
		
		return $this;
	}
	
	/**
	 * Shorten url
	 * 
	 * @param string $url
	 * @return string
	 */
	public function shorten($url)
	{
		$curlTools = new Avans_Tools_Curl();
		
		return $curlTools->getResult('http://api.bit.ly/v3/shorten?login=' . $this->_bitlySettings['bitlyLogin'] . 
			'&apiKey=' . $this->_bitlySettings['bitlyApiKey'] . 
			'&longUrl=' . urlencode($url) . 
			'&format=txt
		');
	}
	
	/**
	 * Expand url
	 *  
	 * @param string $url
	 * @return string
	 */
	public function expand($url)
	{
		$curlTools = new Avans_Tools_Curl();
		
		return $curlTools->getResult('http://api.bit.ly/v3/expand?login=' . $this->_bitlySettings['bitlyLogin'] . 
			'&apiKey=' . $this->_bitlySettings['bitlyApiKey'] . 
			'&shortUrl=' . urlencode($url) . 
			'&format=txt
		');
	}
}