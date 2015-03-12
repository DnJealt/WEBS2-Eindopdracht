<?php

/**
 * @author Mark van Kleef (mkleef@avans.nl)
 * @copyright Copyright (c) 2015, Avans Hogeschool - All rights reserved
 * @version 1.0.0
 */

return array(
	// admin
 	'permission-admin-role-index' => array(
 		'type' 		=> 'Zend_Controller_Router_Route',
 		'route' 	=> 'admin/groepen/:page',
 		'defaults' 	=> array(
 			'module' 		=> 'permission',
 			'controller' 	=> 'admin_role',
 			'action' 		=> 'index',
			'page'			=> 1
 		)
 	),
  	'permission-admin-role-add' => array(
 		'type' 		=> 'Zend_Controller_Router_Route_Static',
 		'route' 	=> 'admin/groep/toevoegen',
 		'defaults' 	=> array(
 			'module' 		=> 'permission',
 			'controller' 	=> 'admin_role',
 			'action' 		=> 'add'
 		)
 	),
   	'permission-admin-role-edit' => array(
 		'type' 		=> 'Zend_Controller_Router_Route',
 		'route' 	=> 'admin/groep/bewerken/:id',
 		'defaults' 	=> array(
 			'module' 		=> 'permission',
 			'controller' 	=> 'admin_role',
 			'action' 		=> 'edit'
 		)
 	),
  	'permission-admin-role-delete' => array(
 		'type' 		=> 'Zend_Controller_Router_Route',
 		'route' 	=> 'admin/groep/verwijderen/:id',
 		'defaults' 	=> array(
 			'module' 		=> 'permission',
 			'controller' 	=> 'admin_role',
 			'action' 		=> 'delete'
 		)
 	),
 	'permission-admin-permission-edit' => array(
 		'type' 		=> 'Zend_Controller_Router_Route',
 		'route' 	=> 'admin/permissie/bewerken/:roleId',
 		'defaults' 	=> array(
 			'module' 		=> 'permission',
 			'controller' 	=> 'admin_permission',
 			'action' 		=> 'edit'
 		)
 	)
);