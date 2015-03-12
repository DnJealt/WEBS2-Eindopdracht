<?php

/**
 * @author Mark van Kleef (mkleef@avans.nl)
 * @copyright Copyright (c) 2015, Avans Hogeschool - All rights reserved
 * @version 1.0.0
 */

class Avans_Tools_Curl
{
	/**
	 * Get result
	 * 
	 * @param string $url
	 * @return string
	 */
	public function getResult($url)
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.7.5) Gecko/20041107 Firefox/1.0');
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10); 
		$content = curl_exec($ch); 
		curl_close($ch);
		
		return $content;
	}
}