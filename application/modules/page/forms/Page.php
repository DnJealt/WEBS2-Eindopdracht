<?php

/**
 * @author Mark van Kleef (mkleef@avans.nl)
 * @copyright Copyright (c) 2015, Avans Hogeschool - All rights reserved
 * @version 1.0.0
 */

class Page_Form_Page extends Avans_TwitterBootstrap_Form
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
		
		$this->addElement('textarea', 'content', 
			array(
				'label'			=> 'Inhoud',
				'required'		=> true,
				'rows'			=> 12,
				'class'			=> 'ckeditor'	
			)
		);
		
		$this->addElement('select', 'column', 
			array(
				'label'			=> 'Kolom',
				'required'		=> true,
				'multiOptions'	=> $this->getView()->columnList()
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
				'label'			=> 'Opslaan'
			)
		);
	}
}