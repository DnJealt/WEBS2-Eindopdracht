<?php

/**
 * @author Mark van Kleef (mkleef@avans.nl)
 * @copyright Copyright (c) 2015, Avans Hogeschool - All rights reserved
 * @version 1.0.0
 */

class Avans_TwitterBootstrap_Decorator_Errors extends Zend_Form_Decorator_Abstract
{
    /**
	 * Render errors
	 *
	 * @param string $content
	 * @return string
	 */
    public function render($content)
    {
        $element = $this->getElement();
        $view = $element->getView();
        if (null === $view) {
            return $content;
        }

        $errors = $element->getMessages();
        if (empty($errors)) {
            return $content;
        }
        
        $formErrors = $view->getHelper('formErrors');
        //$formErrors->setElementSeparator('</span><span>');
        $formErrors->setElementSeparator(' ');
        $formErrors->setElementStart('<span%s>');
        $formErrors->setElementEnd('</span>');

        $separator = $this->getSeparator();
        $placement = $this->getPlacement();
        $errors    = $view->formErrors($errors, $this->getOptions());

        switch ($placement) {
            case self::APPEND:
                return $content . $separator . $errors;
            case self::PREPEND:
                return $errors . $separator . $content;
        }
    }
}