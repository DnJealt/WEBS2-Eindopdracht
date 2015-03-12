<?php

/**
 * @author Mark van Kleef (mkleef@avans.nl)
 * @copyright Copyright (c) 2015, Avans Hogeschool - All rights reserved
 * @version 1.0.0
 */

class Model_Controller
{
    private $module;
    private $key;
    private $langKey;
    private $actions = array();

    public function __construct(Model_Module $module){
        $this->setModule($module);
    }

    public function getModule(){
        return $this->module;
    }

    public function setModule(Model_Module $module){
        $this->module = $module;
    }

    public function getKey(){
        return $this->key;
    }

    public function setKey($key){
        $this->key = $key;
    }

    public function getLangKey(){
        return $this->langKey;
    }

    public function setLangKey($langKey){
        $this->langKey = $langKey;
    }

    /**
     * @return Model_Action[]
     */
    public function getActions(){
        return $this->actions;
    }

    public function setActions(array $actions){
        foreach ($actions as $action){
            if ($action instanceof Model_Action){
                $this->addAction($action);
            }
        }
    }

    public function addAction(Model_Action $action){
        $this->actions[] = $action;
    }

    /* None variable related functions */
    public function getResource(){
        return preg_replace('/\s+/', '', $this->getModule()->getModuleName() . '_' . $this->getKey());
    }
}