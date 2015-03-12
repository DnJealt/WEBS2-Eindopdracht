<?php

/**
 * @author Mark van Kleef (mkleef@avans.nl)
 * @copyright Copyright (c) 2015, Avans Hogeschool - All rights reserved
 * @version 1.0.0
 */

class Avans_Form extends Zend_Dojo_Form
{
	/**
	 * @see Zend_Form::__construct()
	 * @param mixed $options
	 * @return void
	 */
	public function __construct($options = null)
	{
		parent::__construct($options);
		
		$this->setMethod(self::METHOD_POST);
		$this->setAction($this->getView()->url());
		
		$this->addElementPrefixPath('Avans_Filter', 'Avans/Filter', 'filter');
		$this->addElementPrefixPath('Avans_Validate', 'Avans/Validate', 'validate');
		$this->addElementPrefixPath('Avans_Form_Decorator', 'Avans/Form/Decorator', self::DECORATOR);
		
		$this->_setTranslation();
	}
	
	/**
	 * Set form translation
	 * 
	 * @return void
	 */
	protected function _setTranslation()
	{
		$translator = new Zend_Translate('array', APPLICATION_PATH . '/config/language');
		$translator->addTranslation(APPLICATION_PATH . '/config/language/nl/Zend_Validate.php', 'nl');
		
		$this->setTranslator($translator);
	}
}