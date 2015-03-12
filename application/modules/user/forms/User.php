<?php

/**
 * @author Mark van Kleef (mkleef@avans.nl)
 * @copyright Copyright (c) 2015, Avans Hogeschool - All rights reserved
 * @version 1.0.0
 */

class User_Form_User extends Avans_TwitterBootstrap_Form
{	
	/**
	* @see Zend_Form::init()
	* @return void
	*/
	public function init()
	{	
		$this->addElement('text', 'username', 
			array(
				'label'			=> 'Gebruikersnaam',
				'required'		=> true
			)
		);
		
		$this->addElement('prependedtext', 'email', 
			array(
				'label'			=> 'E-mailadres',
				'required'		=> true,
				'content'		=> '@',
				'validators'	=> array(
					'EmailAddress'
				)
			)
		);
		
		$this->addElement('password', 'password', 
			array(
				'label'			=> 'Wachtwoord',
				'required'		=> true,
				'description'	=> 'Vul dit veld alleen in als het wachtwoord gewijzigd dient te worden'
			)
		);
		
		$this->addElement('password', 'passwordVerify',
			array(
				'label'			=> 'Wachtwoord herhalen',
				'required'		=> true,
				'validators' 	=> array(
               		array('Identical', false, array('token' => 'password'))
            	)
			)
		);

		$this->addElement('text', 'color', 
			array(
				'label'			=> 'Kleur'	
			)
		);
		
		$this->addElement('select', 'roleId', 
			array(
				'label'			=> 'Groep',
				'required'		=> true,
				'multiOptions'	=> $this->getView()->roleList()
			)
		);
		
		$this->addElement('select', 'status',
			array(
				'label'			=> 'Status',
				'required'		=> true,
				'multiOptions'	=> $this->getView()->activeList()
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