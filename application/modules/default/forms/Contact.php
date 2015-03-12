<?php

/**
 * @author Mark van Kleef (mkleef@avans.nl)
 * @copyright Copyright (c) 2015, Avans Hogeschool - All rights reserved
 * @version 1.0.0
 */

class Form_Contact extends Avans_TwitterBootstrap_Form
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
				'required'		=> true	
			)
		);
		
		$this->addElement('prependedtext', 'emailaddress', 
			array(
				'label'			=> 'E-mailadres',
                'content'       => '@',
				'required'		=> true,
				'validators'	=> array(
					'EmailAddress'
				)
			)
		);
		
		$this->addElement('select', 'about', 
			array(
				'label'			=> 'Vraag over',
				'required'		=> true,
				'multiOptions'	=> $this->getView()->aboutList()
			)
		);
		
		$this->addElement('text', 'subject',
			array(
				'label'			=> 'Onderwerp',
				'required'		=> true	
			)
		);
		
		$this->addElement('textarea', 'message',
			array(
				'label'			=> 'Bericht',
				'required'		=> true,
				'cols'			=> 60,
				'rows'			=> 30
			)
		);
		
		$this->addElement('hash', 'csrf',
			array(
				'salt'			=> 'unique'
			)
		);
		
		$this->addActionElement('submit', 'submit', 
			array(
				'label'			=> 'Verzenden'
			)
		);
	}
}