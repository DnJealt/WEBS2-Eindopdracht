<?php

/**
 * @author Mark van Kleef (mkleef@avans.nl)
 * @copyright Copyright (c) 2015, Avans Hogeschool - All rights reserved
 * @version 1.0.0
 */

class Avans_TwitterBootstrap_DisplayGroup_Actions extends Zend_Form_DisplayGroup
{
	/**
	 * Load default decorators
	 *
	 * @return Zend_Form_DisplayGroup
	 */
    public function loadDefaultDecorators()
    {
        if($this->loadDefaultDecoratorsIsDisabled())
        {
            return $this;
        }

        $decorators = $this->getDecorators();
        if(empty($decorators))
        {
            $this   ->addDecorator('FormElements')
                    ->addDecorator('HtmlTag', array('tag' => 'div', 'class' => 'col-lg-offset-2 col-lg-6'))
                    ->addDecorator(array('row' => 'HtmlTag'), array('class' => 'form-group'));
        }
        
        return $this;
    }
}