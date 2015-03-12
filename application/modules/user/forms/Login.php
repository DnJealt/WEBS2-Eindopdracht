<?php

/**
 * @author Mark van Kleef (mkleef@avans.nl)
 * @copyright Copyright (c) 2015, Avans Hogeschool - All rights reserved
 * @version 1.0.0
 */

class User_Form_Login extends Avans_TwitterBootstrap_Form
{	
	/**
	* @see Zend_Form::init()
	* @return void
	*/
	public function init()
	{	
		$this->addElement('text', 'username', 
			array(
				'label'		=> 'Gebruikersnaam',
				'required'	=> true
			)
		);
		
		$this->addElement('password', 'password', 
			array(
				'label'		=> 'Wachtwoord',
				'required'	=> true
			)
		);
		
		$this->addElement('hash', 'csrf', 
			array(
				'salt'			=> 'unique'
			)
		);
		
		$this->addActionElement('submit', 'submit',
			array(
				'label' 	=> 'Inloggen'
			)
		);
		
		$this->addActionElement('reset', 'reset',
			array(
				'label'		=> 'reset'
			)
		);
	}
}