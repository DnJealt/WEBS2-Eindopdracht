<?php

/**
 * @author Mark van Kleef (mkleef@avans.nl)
 * @copyright Copyright (c) 2015, Avans Hogeschool - All rights reserved
 * @version 1.0.0
 */

class Avans_TwitterBootstrap_SubForm extends Avans_TwitterBootstrap_Form
{
    /**
	 * Whether or not form elements are members of an array
	 * @var bool
	 */
    protected $_isArray = true;

    public function loadDefaultDecorators()
    {
        if($this->loadDefaultDecoratorsIsDisabled())
        {
            return $this;
        }

        $decorators = $this->getDecorators();
        if(empty($decorators))
        {
            $this->addDecorator('FormElements')
                 ->addDecorator('Fieldset')
                 ->addDecorator('FormDecorator');
        }
        
        return $this;
    }
}