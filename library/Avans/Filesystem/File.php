<?php

/**
 * @author Mark van Kleef (mkleef@avans.nl)
 * @copyright Copyright (c) 2015, Avans Hogeschool - All rights reserved
 * @version 1.0.0
 */

class Avans_Filesystem_File
{
	/**
	 * Delete files
	 * 
	 * @param array $files
	 * @return void
	 */
	public function deleteFiles(array $files = array())
	{
		foreach($files as $file)
		{
			$this->deleteFile($file);
		}
	}
	
	/**
	 * Delete file
	 * 
	 * @param string $file
	 * @return bool
	 */
	public function deleteFile($file)
	{
		if(file_exists($file))
		{
			if(unlink($file))
			{
				return true;
			}
			
			return false;
		}
		
		return false;
	}
}