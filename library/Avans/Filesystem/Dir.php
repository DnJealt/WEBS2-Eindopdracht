<?php

/**
 * @author Mark van Kleef (mkleef@avans.nl)
 * @copyright Copyright (c) 2015, Avans Hogeschool - All rights reserved
 * @version 1.0.0
 */

class Avans_Filesystem_Dir
{
	/**
	 * Create directory
	 * 
	 * @param string $path
	 * @param int $mode
	 * @param bool $recursive
	 * @return bool
	 */
	public function createDir($path, $mode = 0755, $recursive = false)
	{
		if(!is_dir($path))
		{
			return mkdir($path, $mode, $recursive);
		}
	}
	
	/**
	 * Remove recursively directory
	 * 
	 * @param string $path
	 * @return void
	 */
	public function removeDirRecursively($path)
	{
		if(is_dir($path))
		{
			foreach(glob($path . '/*') as $file)
			{
				if(is_dir($file))
				{
					$this->removeDirRecursively($file);
				}
				else
				{
					unlink($file);
				}
			}
			
			rmdir($path);
		}
	}
}