<?php

/**
 * @author Mark van Kleef (mkleef@avans.nl)
 * @copyright Copyright (c) 2015, Avans Hogeschool - All rights reserved
 * @version 1.0.0
 */

class Permission_Form_Role extends Avans_TwitterBootstrap_Form
{	
	/**
	* @see Zend_Form::init()
	* @return void
	*/
	public function init()
	{	
		$this->addElement('text', 'name', 
			array(
				'label'			=> 'Naam',
                //'class'         => 'form-control',
				'required'		=> true
			)
		);
		
		$this->addElement('hash', 'csrf', 
			array(
				'salt'			=> 'unique'
			)
		);
		
		$this->addActionElement('submit', 'submit',
			array(
				'label' 		=> 'Opslaan'
			)
		);
	}
}