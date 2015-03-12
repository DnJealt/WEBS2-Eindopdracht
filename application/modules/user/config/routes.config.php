<?php

/**
 * @author Mark van Kleef (mkleef@avans.nl)
 * @copyright Copyright (c) 2015, Avans Hogeschool - All rights reserved
 * @version 1.0.0
 */

return array(
	'user-auth-login' => array(
 		'type' 		=> 'Zend_Controller_Router_Route_Static',
 		'route' 	=> 'admin/inloggen',
 		'defaults' 	=> array(
 			'module' 		=> 'user',
 			'controller' 	=> 'auth',
 			'action' 		=> 'login'
 		)
 	),
 	'user-auth-logout' => array(
 		'type'		=> 'Zend_Controller_Router_Route_Static',
 		'route' 	=> 'admin/uitloggen',
 		'defaults' 	=> array(
 			'module' 		=> 'user',
 			'controller' 	=> 'auth',
 			'action' 		=> 'logout'
 		)
 	),
 	
 	// admin
    'user-admin-index-index' => array(
    	'type' 		=> 'Zend_Controller_Router_Route',
    	'route'		=> 'admin/gebruikers/:page',
    	'defaults' 	=> array(
    		'module' 		=> 'user',
    		'controller' 	=> 'admin_index',
    		'action'		=> 'index',
    		'page'			=> 1
    	)
    ),
	'user-admin-index-add' => array(
    	'type' 		=> 'Zend_Controller_Router_Route_Static',
    	'route'		=> 'admin/gebruiker/toevoegen',
    	'defaults' 	=> array(
    		'module' 		=> 'user',
    		'controller' 	=> 'admin_index',
    		'action'		=> 'add'
    	)
    ),
	'user-admin-index-edit' => array(
    	'type' 		=> 'Zend_Controller_Router_Route',
    	'route'		=> 'admin/gebruiker/bewerken/:id',
    	'defaults' 	=> array(
    		'module' 		=> 'user',
    		'controller' 	=> 'admin_index',
    		'action'		=> 'edit'
    	)
    ),
	'user-admin-index-delete' => array(
    	'type' 		=> 'Zend_Controller_Router_Route',
    	'route'		=> 'admin/gebruiker/verwijderen/:id',
    	'defaults' 	=> array(
    		'module' 		=> 'user',
    		'controller' 	=> 'admin_index',
    		'action'		=> 'delete'
    	)
    )
);