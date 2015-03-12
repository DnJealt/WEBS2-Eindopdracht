<?php

/**
 * @author Mark van Kleef (mkleef@avans.nl)
 * @copyright Copyright (c) 2015, Avans Hogeschool - All rights reserved
 * @version 1.0.0
 */

class Avans_Tools_String
{
	/**
	* Hash the string
	*
	* @param string $value
	* @param string $hash
	* @return string
	*/
	public static function hash($value, $hash = 'sha512')
	{
		return hash($hash, $value);
	}
	
	/**
	* Generate random string
	*
	* @param int $length
	* @return string
	*/
	public static function random($length = 10)
	{
		$string = '';
		$chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		
		for($i = 0; $i < $length; $i++)
		{
			$char = rand(0, strlen($chars)-1);
			$string .= $chars[$char];
		}
		
		return $string;
	}
}