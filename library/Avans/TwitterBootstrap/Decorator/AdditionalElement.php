<?php

/**
 * @author Mark van Kleef (mkleef@avans.nl)
 * @copyright Copyright (c) 2015, Avans Hogeschool - All rights reserved
 * @version 1.0.0
 */

class Avans_TwitterBootstrap_Decorator_AdditionalElement extends Zend_Form_Decorator_Abstract
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

        $isActive = (bool) $element->getAttrib('isActive');

        $tag = $this->getOption('tag');
        $tag = empty($tag) ? 'span' : $tag;

        $class = $this->getOption('class');
        $class = trim($class);
        $class = array(
            'input-group-addon',
            empty($class) ? '' : $class,
            $isActive ? 'active' : ''
        );
        $class = implode(' ', $class);


        $additionalContent = $element->getAttrib('content');
        $additionalContent = empty($tag) ? '' : $additionalContent;

        $deoration = '<%1$s class="%2$s">%3$s</%1$s>';
        $deoration = sprintf($deoration, $tag, $class, $additionalContent);

        switch($this->getPlacement())
        {
            case self::PREPEND:
                return $deoration.$content;
            case self::APPEND:
            default:
                return $content.$deoration;
        }
    }
}