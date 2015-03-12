<?php

/**
 * @author Mark van Kleef (mkleef@avans.nl)
 * @copyright Copyright (c) 2015, Avans Hogeschool - All rights reserved
 * @version 1.0.0
 */

class Model_Action
{
    private $controller;
    private $key;
    private $langKey;
    private $editAble   = true;

    public function __construct(Model_Controller $controller){
        $this->setController($controller);
    }

    public function getController(){
        return $this->controller;
    }

    public function setController(Model_Controller $controller){
        $this->controller = $controller;
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

    public function isEditAble(){
        return (boolean) $this->editAble;
    }

    public function setEditAble($editAble = true){
        $this->editAble = $editAble;
    }
}