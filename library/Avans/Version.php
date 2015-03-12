<?php

/**
 * @author Mark van Kleef (mkleef@avans.nl)
 * @copyright Copyright (c) 2015, Avans Hogeschool - All rights reserved
 * @version 1.0.0
 */

final class Avans_Version
{
	/**
	 * Application version
	 * 
	 * @var string
	 */
	const VERSION = '1.0.0';

	/**
	 * Compares the specified version string $version with the current self::VERSION
	 *
	 * @param string $version A version string (e.g. "1.0.0)
	 * @return int -1 if the $version is older | 0 if they are the same | +1 if $version is newer
	 */
	public static function compareVersion($version)
	{
		return version_compare($version, self::VERSION);
	}
}