<?php

/**
 * @author Mark van Kleef (mkleef@avans.nl)
 * @copyright Copyright (c) 2015, Avans Hogeschool - All rights reserved
 * @version 1.0.0
 */

return array(
	'shop-shopping-index' => array(
 		'type' 		=> 'Zend_Controller_Router_Route_Static',
 		'route' 	=> 'winkelen',
 		'defaults' 	=> array(
 			'module' 		=> 'shop',
 			'controller' 	=> 'shopping',
 			'action' 		=> 'index'
 		)
 	),
 	'shop-cart-index' => array(
 		'type'		=> 'Zend_Controller_Router_Route_Static',
 		'route' 	=> 'vitrine',
 		'defaults' 	=> array(
 			'module' 		=> 'shop',
 			'controller' 	=> 'showcase',
 			'action' 		=> 'index'
 		)
 	),
	'shop-cart-shopping' => array(
 		'type'		=> 'Zend_Controller_Router_Route_Static',
 		'route' 	=> 'winkelwagen/:user',
 		'defaults' 	=> array(
 			'module' 		=> 'shop',
 			'controller' 	=> 'cart',
 			'action' 		=> 'shopping'
 		)
	),
);