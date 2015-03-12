<?php

/**
 * @author Mark van Kleef (mkleef@avans.nl)
 * @copyright Copyright (c) 2015, Avans Hogeschool - All rights reserved
 * @version 1.0.0
 */

class Avans_TwitterBootstrap_Tabs Extends Zend_Dojo_Form_SubForm
{
	const DISPLAY_GROUP_ACTION = 'actions';
	
    const ELEMENT_PREPENDED_TEXT = 'prependedtext';
    const ELEMENT_APPENDED_TEXT = 'appendedtext';
    
    private $customeElementDecoratorDefault = array(
        'ViewHelper',
        array('Errors', array('class' => 'help-inline')),
        array('Description', array('tag' => 'span', 'class' => 'help-block')),
        array('HtmlTag', array('tag' => 'div', 'class' => 'input')),
        'Label',
        'ElementWrapper'
    );
    
	private $customeActionElementDecorator = array(
        'ViewHelper',
    );
    
    private $customeElementDecorators = array(
        'text' => array(
            'decorators' => array(
                'ViewHelper',
                array('Errors', array('class' => 'help-inline')),
                array('Description', array('tag' => 'span', 'class' => 'help-block')),
                array('HtmlTag', array('tag' => 'div', 'class' => 'col-lg-5')),
                array('Label', array('class' => 'col-lg-2 control-label')),
                'ElementWrapper'
            ),
            'options' => array(
                'class' => 'form-control',
            ),
        ),
		'password' => array(
            'decorators' => array(
                'ViewHelper',
                array('Errors', array('class' => 'help-inline')),
                array('Description', array('tag' => 'span', 'class' => 'help-block')),
                array('HtmlTag', array('tag' => 'div', 'class' => 'controls')),
                array('Label', array('class' => 'col-lg-2 control-label')),
                'ElementWrapper'
            ),
            'options' => array(
                'class' => 'form-control',
            ),
        ),
        'file' => array(
            'decorators' => array(
                'File',
                array('Errors', array('class' => 'help-inline')),
                array('Description', array('tag' => 'span', 'class' => 'help-block')),
                array('HtmlTag', array('tag' => 'div', 'class' => 'col-lg-5')),
                array('Label', array('class' => 'col-lg-2 control-label')),
                'ElementWrapper'
            ),
            'options' => array(
                'class' => 'form-control',
            ),
        ),
        'textarea' => array(
            'options' => array(
                'class' => 'form-control xxlarge',
                'rows' => 3
            ),
            'decorators' => array(
                'ViewHelper',
                array('Errors', array('class' => 'help-inline')),
                array('Description', array('tag' => 'span', 'class' => 'help-block')),
                array('HtmlTag', array('tag' => 'div', 'class' => 'col-lg-5')),
                array('Label', array('class' => 'col-lg-2 control-label')),
                'ElementWrapper'
            ),
        ),
        self::ELEMENT_PREPENDED_TEXT => array(
            'helper' => 'text',
            'decorators' => array(
                'ViewHelper',
                array('AdditionalElement', array('placement' => 'PREPEND')),
                array(array('input' => 'HtmlTag'), array('tag' => 'div', 'class' => 'input-group')),
                array('Errors', array('class' => 'help-inline')),
                array('Description', array('tag' => 'span', 'class' => 'help-block')),
                array('HtmlTag', array('tag' => 'div', 'class' => 'col-lg-5')),
                array('Label', array('class' => 'col-lg-2 control-label')),
                'ElementWrapper'
            ),
            'options' => array(
                'class' => 'form-control',
            ),
        ),
        self::ELEMENT_APPENDED_TEXT => array(
            'helper' => 'text',
            'decorators' => array(
                'ViewHelper',
                array('AdditionalElement', array('placement' => 'APPEND')),
                array(array('input' => 'HtmlTag'), array('tag' => 'div', 'class' => 'input-group')),
                array('Errors', array('class' => 'help-inline')),
                array('Description', array('tag' => 'span', 'class' => 'help-block')),
                array('HtmlTag', array('tag' => 'div', 'class' => 'col-lg-5')),
                array('Label', array('class' => 'col-lg-2 control-label')),
                'ElementWrapper'
            ),
            'options' => array(
                'class' => 'form-control',
            ),
        ),
        'button' => array(
            'options' => array(
                'class' => 'btn'
            ),
        ),
        'reset' => array(
            'options' => array(
                'class' => 'btn'
            ),
        ),
        'submit' => array(
            'options' => array(
                'class' => 'btn btn-primary'
            ),
        ),
        'select' => array(
        	'decorators' => array(
                'ViewHelper',
                array('Errors', array('class' => 'help-inline')),
                array('Description', array('tag' => 'span', 'class' => 'help-block')),
                array('HtmlTag', array('tag' => 'div', 'class' => 'col-lg-5')),
                array('Label', array('class' => 'col-lg-2 control-label')),
                'ElementWrapper'
            ),
            'options' => array(
                'class' => 'form-control',
            ),
        ),
        'multiselect' => array(
        	'decorators' => array(
                'ViewHelper',
                array('Errors', array('class' => 'help-inline')),
                array('Description', array('tag' => 'span', 'class' => 'help-block')),
                array('HtmlTag', array('tag' => 'div', 'class' => 'col-lg-5')),
                array('Label', array('class' => 'col-lg-2 control-label')),
                'ElementWrapper'
            ),
            'options' => array(
                'class' => 'form-control',
            ),
        ),
        'checkbox' => array(
        	'decorators' => array(
                'ViewHelper',
                array('Errors', array('class' => 'help-inline')),
                array('Description', array('tag' => 'span', 'class' => 'help-block')),
                array('HtmlTag', array('tag' => 'div', 'class' => 'col-lg-5')),
                array('Label', array('class' => 'col-lg-2 control-label')),
                'ElementWrapper'
            ),
            'options' => array(
                'class' => 'form-control',
            ),
        ),
        'hash' => array(),
        'form' => array(),
    );
    
    /**
     * @see Zend_Form::construct()
     * @param mixed $options
     * @return void
     */
    public function __construct($options = null)
    {
    	$this->addElementPrefixPath('Avans_TwitterBootstrap_Decorator', 'Avans/TwitterBootstrap/Decorator', self::DECORATOR);
    	
    	parent::__construct($options);
    }
    
    /**
     * @see Zend_Form::addElement()
     * @param  string|Zend_Form_Element $element
     * @param  string $name
     * @param  array|Zend_Config $options
     * @throws Zend_Form_Exception on invalid element
     * @return Zend_Form
     */
    public function addElement($element, $name = null, $options = null)
    {
        if(is_string($element))
        {
            $element = strtolower($element);
            if(isset($this->customeElementDecorators[$element]))
            {
                $baseOptions = $this->customeElementDecorators[$element];

                if(!isset($options['decorators']))
                {
                    if(isset($baseOptions['decorators']))
                    {
                        $decorators = $baseOptions['decorators'];
                        $options['decorators'] = (isset($options['decorators']))
                                ? array_merge($options['decorators'], $decorators)
                                : $decorators;
                    }
                    else
                    {
                        $options['decorators'] = $this->customeElementDecoratorDefault;
                    }
                }

                if(isset($baseOptions['helper'])) {
                    $element = $baseOptions['helper'];
                }

                if(isset($baseOptions['options']))
                {
                    foreach($baseOptions['options'] as $key => $value)
                    {
                        if(!isset($options[$key])) {
                            $options[$key] = null;
                        }

                        switch($key)
                        {
                            case 'class':
                                $options[$key] .= ' ' . $baseOptions['options'][$key];
                                break;

                            case 'rows':
                                $options[$key] = (null !== $options[$key]) ? $options[$key] : $baseOptions['options'][$key];
                                break;

                            default:
                                throw new Zend_Form_Exception('Merging option key "'.$key.'" is not defined');
                        }
                    }
                }

                return parent::addElement($element, $name, $options);
            }
        }

        return parent::addElement($element, $name, $options);
    }

    /**
     * Add action element
     * 
     * @param string $element
     * @param string $name
     * @param null|array $options
     * @return void
     */
    public function addActionElement($element, $name, $options = null)
    {
        if(null === $options) {
            $options = array();
        } elseif ($options instanceof Config) {
            $options = $options->toArray();
        }

        $options['decorators'] = $this->customeActionElementDecorator;

        $this->addElement($element, $name, $options);
        $element = $this->getElement($name);

        $displayGroup = $this->getDisplayGroup(self::DISPLAY_GROUP_ACTION);
        if(!$displayGroup instanceof Zend_Form_DisplayGroup)
        {
            $elements = array(
                $name
            );
            $options = array(
                'displayGroupClass' => 'Avans_TwitterBootstrap_DisplayGroup_Actions'
            );
            $this->addDisplayGroup($elements, self::DISPLAY_GROUP_ACTION, $options);
        }
        else
        {
            unset($this->_order[$name]);
            $displayGroup->addElement($element);
        }
    }

    /**
     * @see Zend_Form::loadDefaultDecorators()
     * @return this
     */
	public function loadDefaultDecorators()
    {
        if ($this->loadDefaultDecoratorsIsDisabled()) {
            return;
        }

        $decorators = $this->getDecorators();
        if (empty($decorators)) {
            $this->addDecorator('FormElements')
                 ->addDecorator('HtmlTag', array('tag' => 'dl'))
                 ->addDecorator('ContentPane');
        }
    }
}