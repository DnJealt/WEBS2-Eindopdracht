<?php

/**
 * @author Mark van Kleef (mkleef@avans.nl)
 * @copyright Copyright (c) 2015, Avans Hogeschool - All rights reserved
 * @version 1.0.0
 */

abstract class Avans_Filter_File_Resize_Adapter_Abstract
{
	/**
	 * Resize
	 * 
	 * @param array $options
	 * @return string
	 */
	abstract public function resize(array $options);
}