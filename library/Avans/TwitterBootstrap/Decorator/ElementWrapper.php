<?php

/**
 * @author Mark van Kleef (mkleef@avans.nl)
 * @copyright Copyright (c) 2015, Avans Hogeschool - All rights reserved
 * @version 1.0.0
 */

class Avans_TwitterBootstrap_Decorator_ElementWrapper extends Zend_Form_Decorator_Abstract
{
    /**
	 * Decorate content and/or element
	 *
	 * @param string $content
	 * @return string
	 */
    public function render($content)
    {
        $element = $this->getElement();
        if (!$element instanceof Zend_Form_Element) {
            return $content;
        }

        $class = $this->getOption('class');
        $class = trim($class);
        $class = array(
            'form-group',
            empty($class) ? '' : $class,
        );

        if ($element->hasErrors()) {
            $class[] = 'error';
        }

        $class = implode(' ', $class);

        $deoration = '<div class="%s">%s</div>';
        $deoration = sprintf($deoration, $class, $content);

        return $deoration;
    }
}