<?php

/**
 * @author Mark van Kleef (mkleef@avans.nl)
 * @copyright Copyright (c) 2015, Avans Hogeschool - All rights reserved
 * @version 1.0.0
 */

class Avans_Filter_File_Resize_Adapter_Gd extends Avans_Filter_File_Resize_Adapter_Abstract
{
	/**
	 * @see Avans_Filter_File_Resize_Adapter_Abstract
	 * @param array $options
	 * @return string
	 */
	public function resize(array $options)
	{
		list($oldWidth, $oldHeight, $type) = getimagesize($options['file']);
		$source = imagecreatefromjpeg($options['file']);
		$thumb = imagecreatetruecolor($options['width'], $options['height']);
		imagealphablending($thumb, false);
        imagesavealpha($thumb, true);
 		imagecopyresampled($thumb, $source, 0, 0, 0, 0, $options['width'], $options['height'], $oldWidth, $oldHeight);
		imagejpeg($thumb, $options['target']);
		
		return $options['target'];
	}
}