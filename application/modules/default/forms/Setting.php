<?php

/**
 * @author Mark van Kleef (mkleef@avans.nl)
 * @copyright Copyright (c) 2015, Avans Hogeschool - All rights reserved
 * @version 1.0.0
 */

class Form_Setting extends Avans_TwitterBootstrap_Form // extends Avans_TwitterBootstrap_Form
{
	/**
	 * @see Zend_Form::init()
	 * @return void
	 */
	
	public function init()
	{
		$this->setDecorators(array(
			'FormElements',
			array('TabContainer', array(
				'id'			=> 'tabContainer',
				'style'			=> 'width: auto;',
				'class'			=> 'tab-content',

			)),
			'DijitForm',
		));
		
		$global = new Avans_TwitterBootstrap_Tabs();
		$global->setAttribs(array(
			'name'			=> 'textboxtab',
			'legend'		=> 'Text Elements',
			'dijitParams'	=> array(
				'title'		=> 'Algemeen',	
			),
			'class'			=> 'tab-pane active',
		));
		
			$global->addElement('text', 'siteTitle',
					array(
							'label'			=> 'Titel van de site',
							'required'		=> true
					)
			);
			
			$global->addElement('text', 'siteSlogan',
					array(
							'label'			=> 'Slogan van de site'
					)
			);
			
			$global->addElement('prependedtext', 'emailaddress',
					array(
							'label'			=> 'E-mailadres',
							'content'		=> '@',
							'style'			=> 'width: 178px;',
							'validators'	=> array(
									'EmailAddress'
							),
							'description'	=> 'E-Mail van de webmaster'
					)
			);
			
			$global->addElement('text', 'pageCountFront',
					array(
							'label'			=> 'Items per pagina (frontend)'
					)
			);
			
			$global->addElement('text', 'pageCountBack',
					array(
							'label'			=> 'Items per pagina (backend)'
					)
			);
		
		$plugins = new Avans_TwitterBootstrap_Tabs();
		$plugins->setAttribs(array(
			'name'			=> 'toggletab',
			'legend'		=> 'Toggle Elements',
			'class'			=> 'tab-pane',
		));
		
			$plugins->addElement('textarea', 'googleAnalytics',
					array(
						'label'			=> 'Google Analytics',
						'rows'			=> 6,
						'cols'			=> 15,
					)
			);
			
			$plugins->addElement('text', 'twitterConsumerKey',
					array(
							'label'			=> 'Twitter Consumer Key'
					)
			);
			
			$plugins->addElement('text', 'twitterConsumerSecret',
					array(
							'label'			=> 'Twitter Consumer Secret'
					)
			);
			
		$admin = new Avans_TwitterBootstrap_Tabs();
		$admin->setAttribs(array(
				'name'			=> 'toggletab',
				'legend'		=> 'Toggle Elements',
				'class'			=> 'tab-pane',
		));
			
			$admin->addElement('checkbox', 'otherAllowed',
					array(
							'label'			=> 'Andere toestaan',
							'description'	=> 'Niet-admins mogen (enkele) velden aanpassen van dit formulier'
					)
			);
		
		$this->addElement('hash', 'csrf',
				array(
						'salt'			=> 'unique'
				)
		);
		
			
		$this->addSubForm($global, 'Algemeen')
			 ->addSubForm($plugins, 'Plugins')
			 ->addSubForm($admin, 'Manager');
		

		$this->addActionElement('submit', 'submit',
				array(
						'label'			=> 'Opslaan'
				)
		);
	}
}