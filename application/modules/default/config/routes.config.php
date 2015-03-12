<?php

/**
 * @author Mark van Kleef (mkleef@avans.nl)
 * @copyright Copyright (c) 2015, Avans Hogeschool - All rights reserved
 * @version 1.0.0
 */

return array(
	'default-index-index' => array(
 		'type' 		=> 'Zend_Controller_Router_Route_Static',
 		'route' 	=> '/',
 		'defaults' 	=> array(
 			'module' 		=> 'default',
 			'controller' 	=> 'index',
 			'action' 		=> 'index'
 		)
 	),
 	'default-contact-index' => array(
 		'type'		=> 'Zend_Controller_Router_Route_Static',
 		'route'		=> 'contact',
 		'defaults'	=> array(
 			'module'		=> 'default',
 			'controller'	=> 'contact',
 			'action'		=> 'index'
 		)
 	),

 	// admin
 	'default-admin-index-index' => array(
 		'type' 		=> 'Zend_Controller_Router_Route_Static',
 		'route' 	=> '/admin',
 		'defaults' 	=> array(
 			'module' 		=> 'default',
 			'controller' 	=> 'admin_index',
 			'action' 		=> 'index'
 		)
 	),
	'default-admin-setting-index' => array(
 		'type' 		=> 'Zend_Controller_Router_Route_Static',
 		'route' 	=> 'admin/instellingen',
 		'defaults' 	=> array(
 			'module' 		=> 'default',
 			'controller' 	=> 'admin_setting',
 			'action' 		=> 'index'
 		)
 	),
  	'default-admin-twitter-authenticate' => array(
 		'type'		=> 'Zend_Controller_Router_Route_Static',
 		'route'		=> 'twitter/authenticate',
 		'defaults'	=> array(
 			'module'		=> 'default',
 			'controller'	=> 'admin_twitter',
 			'action'		=> 'authenticate'
 		)
 	),
 	'default-admin-twitter-callback' => array(
 		'type'		=> 'Zend_Controller_Router_Route_Static',
 		'route'		=> 'twitter/callback',
 		'defaults'	=> array(
 			'module'		=> 'default',
 			'controller'	=> 'admin_twitter',
 			'action'		=> 'callback'
 		)
 	),

 	/*// mobile
 	'default' => array(
 		'type'		=> 'Zend_Controller_Router_Route_Hostname',
 		'route'		=> MOBILE_URL,
 		'defaults'	=> array(
 			'module'		=> 'default',
 			'controller'	=> 'mobile_index',
 			'action'		=> 'index'
 		),
 		'chains' => array(
 			'mobile-index-index'	=> array(
 				'type'			=> 'Zend_Controller_Router_Route_Static',
 				'route'			=> '/',
 				'defaults'		=> array(
 					'module'		=> 'default',
 					'controller'	=> 'mobile_index',
 					'action'		=> 'index'
 				)
 			)
 		)
 	)*/
);