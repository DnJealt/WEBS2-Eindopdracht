<?php

/**
 * @author Mark van Kleef (mkleef@avans.nl)
 * @copyright Copyright (c) 2015, Avans Hogeschool - All rights reserved
 * @version 1.0.0
 */

class Avans_View_Helper_Truncate extends Zend_View_Helper_Abstract
{
	/**
	 * Truncate
	 *  
	 * @param string $string
	 * @param int $length
	 * @return string
	 */
	public function truncate($string, $length = 220)
	{
		if(strlen($string) <= $length)
		{
			return $string;
		}
		
		$string = substr($string, 0, $length);
		if(false !== ($breakpoint = strrpos($string, ' ')))
		{
			$string = substr($string, 0, $breakpoint);
		}
		
		return $string . '...';
	}
}