<?php

/**
 * @author Mark van Kleef (mkleef@avans.nl)
 * @copyright Copyright (c) 2015, Avans Hogeschool - All rights reserved
 * @version 1.0.0
 */

define('SITE_URL', 'http://localhost/WEBS2-Eindopdracht/');

return array_merge_recursive(array(
    'bootstrap' => array(
        'path' 	=> APPLICATION_PATH . '/Bootstrap.php',
        'class' => 'Bootstrap'
    ),
    'autoloaderNamespaces' => array(
        'Avans_',
    	'ZendX_'
    ),
    'pluginPaths' => array(
    	'Avans_Application_Resource' => LIBRARY_PATH . '/Avans/Application/Resource'
    ),
    'resources' => array(
        'frontController' 		=> array(
            'moduleDirectory' 	=> APPLICATION_PATH . '/modules',
            'plugins' 	=> array(
            	'auth' 		=> 'Avans_Controller_Plugin_Auth',
    			'mobile'	=> 'Avans_Controller_Plugin_Mobile'
            ),
        ),
        'modules' 	=> array(),
        'router' 	=> array(
            'routes' 	=> include APPLICATION_PATH . '/modules/default/config/routes.config.php'
        ),
        'locale' => array(
            'default' 	=> 'nl_NL',
            'force' 	=> true
        ),
        'view' => array(
            'helperPath' 	=> array(
                'Avans_View_Helper_' => LIBRARY_PATH . '/Avans/View/Helper'
             ),
             'scriptPath' 	=> array(
             	APPLICATION_PATH . '/template/layout'
             )
        ),
		'multidb' => array(
        	'default' 	=> array(
	        	'adapter' 	=> 'mysqli',
				'host' 		=> 'databases.aii.avans.nl',
		        'port' 		=> '3306', // Default port is 3306
				'username' 	=> 'jlmtartw',
				'password' 	=> 'Ab12345',
				'dbname' 	=> 'jlmtartw_db',
				'prefix' 	=> '',
				'charset' 	=> 'utf8',
        		'default'	=> true
        	),
		),
		'useragent' => array(
			'storage' => array(
				'adapter' => 'Session',
			),
		),
		'Cachemanager' 	=> array(
			'default' 	=> array(
				'frontend' => array(
		            'name' 		=> 'Core',
					'options' 	=> array(
						'lifetime' 					=> null,
						'automatic_serialization' 	=> true
	                )
				),
				'backend' => array(
					'name' 		=> 'File',
					'options' 	=> array(
						'cache_dir' => BASE_PATH . '/data/cache'
			        )
				)
			)
		)
	)
), include dirname(__FILE__) . '/' . APPLICATION_ENV . '.config.php');