<?php

/**
 * @author Mark van Kleef (mkleef@avans.nl)
 * @copyright Copyright (c) 2015, Avans Hogeschool - All rights reserved
 * @version 1.0.0
 */

class Page_View_Helper_ColumnList extends Zend_View_Helper_Abstract
{
	/**
	 * Column list
	 * 
	 * @param int $column
	 * @return array
	 */
	public function columnList($column = null)
	{
		$settingModel = new Model_Setting();
		
		$data = array(
			3	=> 'Diensten',
			4	=> 'Over ' . $settingModel->getSettings('siteTitle')
		);
		
		if($column != null)
		{
			return $data[$column];
		}
		
		return $data;
	}
}