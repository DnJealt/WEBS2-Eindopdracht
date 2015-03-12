<?php

/**
 * @author Danny van Wijk (dwijk@deactro.nl)
 * @copyright Copyright (c) 2012, Deactro BV - All rights reserved
 * @version 1.0.0
 */

class Default_View_Helper_AboutList extends Zend_View_Helper_Abstract
{
	/**
	 * About list
	 * 
	 * @param int $about
	 * @return array
	 */
	public function aboutList($about = null)
	{
		$data = array(
			1 => 'Algemeen',
			2 => 'Nieuws/Tip',
			3 => 'Klacht',
			4 => 'Adverteren'
		);
		
		if($about != null)
		{
			return $data[$about];
		}
		
		return $data;
	}
}