<?php

/**
 * @author Mark van Kleef (mkleef@avans.nl)
 * @copyright Copyright (c) 2015, Avans Hogeschool - All rights reserved
 * @version 1.0.0
 */

class Avans_Helper_BodyClass extends Zend_View_Helper_Placeholder_Container_Standalone {
    private $_classes = array();

    public function __construct($classes = null) {
        if(is_array($classes)) {
            $this->addClass($classes);
        }
    }

    public function addClass($class) {
        if(is_array($class)) {
            foreach($class as $k => $c) {
                if(is_string($c)) {
                    if(is_string($k)) {
                        $this->addClass($k .'-'. $c); //recursion
                    } else {
                        $this->addClass($c);
                    }
                } else {
                    throw new Zend_Exception('Class must be a string - is type: '.gettype($c));
                }
            }
            return $this;
        }

        if(is_string($class)) {
            $this->_classes[] = $class;
            return $this;
        } else {
            throw new Zend_Exception('Class must be a string - is type: '.gettype($class));
        }
    }

    public function removeClass($class) {
        $key = array_search($class, $this->_classes);
        if($key !== false) {
            unset($this->_classes[$key]);
        }
        return $this;
    }

    public function bodyClass() {
        return $this;
    }

    public function toString() {
        return implode(' ', $this->_classes);
    }
}
?>