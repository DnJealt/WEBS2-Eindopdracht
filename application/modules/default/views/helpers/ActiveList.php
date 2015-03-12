<?php

/**
 * @author Mark van Kleef (mkleef@avans.nl)
 * @copyright Copyright (c) 2015, Avans Hogeschool - All rights reserved
 * @version 1.0.0
 */

class Default_View_Helper_ActiveList extends Zend_View_Helper_Abstract
{
	/**
	 * Active list
	 * 
	 * @param int $status
	 * @return array
	 */
	public function activeList($status = null)
	{
		$data = array(
			1	=> 'Actief',
			0	=> 'Inactief'
		);
		
		if($status != null)
		{
			return $data[$status];
		}
		
		return $data;
	}
}