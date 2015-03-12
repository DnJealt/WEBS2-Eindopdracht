<?php

/**
 * @author Mark van Kleef (mkleef@avans.nl)
 * @copyright Copyright (c) 2015, Avans Hogeschool - All rights reserved
 * @version 1.0.0
 */

return array(
    'phpSettings' => array(
        'display_startup_errors' => 1,
        'display_errors' => 1,
        'error_reporting' => (E_ALL | E_STRICT)
	),
    'resources' => array(
        'frontController' => array(
            'throwExceptions' => true,
			'throwErrors' => true
		)
	)
);