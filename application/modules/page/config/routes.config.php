<?php

/**
 * @author Mark van Kleef (mkleef@avans.nl)
 * @copyright Copyright (c) 2015, Avans Hogeschool - All rights reserved
 * @version 1.0.0
 */

return array(
	'page-index-index' => array(
		'type'		=> 'Zend_Controller_Router_Route_Regex',
		'route'		=> '^(?!admin|nieuws|p2000|contact)([a-z0-9-]+)',
		'defaults' 	=> array( 
			'module'		=> 'page',
			'controller'	=> 'index',
			'action'		=> 'index'
		),
		'map' => array(
			'page' => 1
		),
		'reverse' => '%s'
	),

    // admin
    'page-admin-index-index' => array(
    	'type' 		=> 'Zend_Controller_Router_Route',
    	'route'		=> 'admin/paginas/:page',
    	'defaults' 	=> array(
    		'module' 		=> 'page',
    		'controller' 	=> 'admin_index',
    		'action'		=> 'index',
    		'page'			=> 1
    	)
    ),
	'page-admin-index-add' => array(
    	'type' 		=> 'Zend_Controller_Router_Route_Static',
    	'route'		=> 'admin/pagina/toevoegen',
    	'defaults' 	=> array(
    		'module' 		=> 'page',
    		'controller' 	=> 'admin_index',
    		'action'		=> 'add'
    	)
    ),
	'page-admin-index-edit' => array(
    	'type' 		=> 'Zend_Controller_Router_Route',
    	'route'		=> 'admin/pagina/bewerken/:id',
    	'defaults' 	=> array(
    		'module' 		=> 'page',
    		'controller' 	=> 'admin_index',
    		'action'		=> 'edit'
    	)
    ),
	'page-admin-index-delete' => array(
    	'type' 		=> 'Zend_Controller_Router_Route',
    	'route'		=> 'admin/pagina/verwijderen/:id',
    	'defaults'	=> array(
    		'module' 		=> 'page',
    		'controller' 	=> 'admin_index',
    		'action'		=> 'delete'
    	)
    )
);