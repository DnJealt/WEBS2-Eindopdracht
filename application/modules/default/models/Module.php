<?php

/**
 * @author Mark van Kleef (mkleef@avans.nl)
 * @copyright Copyright (c) 2015, Avans Hogeschool - All rights reserved
 * @version 1.0.0
 */

class Model_Module
{
    private $moduleName;
    private $moduleDir;
    private $controllers = array();

    public function getModuleName(){
        return $this->moduleName;
    }

    public function setModuleName($moduleName){
        $this->moduleName = $moduleName;
    }

    public function getModuleDir(){
        return $this->moduleDir;
    }

    public function setModuleDir($moduleDir){
        $this->moduleDir = $moduleDir;
    }

    /**
     * @param $controllerName
     * @return Model_Controller
     */
    public function getController($controllerName){
        foreach ($this->getControllers() as $controller){
            if ($controller->getKey() == $controllerName){
                return $controller;
            }
        }
    }

    /**
     * @return Model_Controller[]
     */
    public function getControllers(){
        return $this->controllers;
    }

    /**
     * @param Model_Controller $controllers
     */
    public function setControllers(array $controllers){
        foreach($controllers as $controller){
            if ($controller instanceof Model_Controller){
                $this->addController($controller);
            }
        }
    }

    /**
     * @param Model_Controller $controller
     */
    public function addController(Model_Controller $controller){
        $this->controllers[] = $controller;
    }
}