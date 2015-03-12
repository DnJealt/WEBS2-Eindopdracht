<?php

/**
 * @author Mark van Kleef (mkleef@avans.nl)
 * @copyright Copyright (c) 2015, Avans Hogeschool - All rights reserved
 * @version 1.0.0
 */
class Avans_View_Helper_Plural extends Zend_View_Helper_Abstract
{
	/**
	 * Plural
	 * 
	 * @param int $count
	 * @param string $singular
	 * @param string $plural
	 * @return string
	 */
	public function plural($count, $singular, $plural = 's')
	{
		if($count == 1)
		{
			return $count . ' ' . $singular;
		}
		
		return $count . ' ' . $singular . $plural;
	}
}