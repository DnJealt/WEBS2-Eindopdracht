<?php

/**
 * @author Mark van Kleef (mkleef@avans.nl)
 * @copyright Copyright (c) 2015, Avans Hogeschool - All rights reserved
 * @version 1.0.0
 */

class Avans_Module
{
    /**
     * Singleton instance
     *
     * @var Avans_Module
     */
    protected static $_instance;

    /**
     * Modules
     *
     * @var array
     */
    protected $_modules = array();

    /**
     * Get instance
     *
     * @return Avans_Module
     */
    public static function getInstance()
    {
        if(!isset(self::$_instance))
        {
            self::$_instance = new self();
        }

        return self::$_instance;
    }

    /**
     * Constructor
     *
     * @return void
     */
    public function __construct()
    {
        $this->getModules();
    }

    /**
     * Get modules
     *
     * @return Model_Module[]
     */
    public function getModules()
    {
        foreach(Zend_Controller_Front::getInstance()->getControllerDirectory() as $moduleName => $moduleDir)
        {
            $moduleName	= $this->formatModuleName($moduleName);
            $moduleDir	= $this->formatModuleDir($moduleDir);

            if(!array_key_exists($moduleName, $this->_modules))
            {
                $module = new Model_Module();
                $module->setModuleName($moduleName);
                $module->setModuleDir($moduleDir);
                $module->setControllers($this->getControllers($module));

                $this->_modules[$moduleName] = $module;
            }
        }

        return $this->_modules;
    }

    public function getControllers(Model_Module $module){
        $controllers        = array();
        $controllerFiles    = array();

        foreach(array_diff(scandir($module->getModuleDir()), array('.','..')) as $file)
        {
            foreach($this->getControllerFiles($module->getModuleDir(), $file) as $cf){
                $controllerFiles[] = $cf;
            }
        }


        foreach($controllerFiles as $controllerFile){
            if (empty($controllerFile)) continue;
            include $controllerFile;

            $controller = new Model_Controller($module);

            foreach (get_declared_classes() as $class) {
                $reflectionClass = new ReflectionClass($class);
                if (get_parent_class($class) == 'Zend_Controller_Action' && $reflectionClass->getFileName() == $controllerFile) {
                    $controller->setKey(str_replace($module->getModuleName() . "_", " ", strtolower(substr($class, 0, strpos($class, "Controller")))));

                    $rc = new ReflectionClass($class);
                    $controller->setLangKey($rc->hasConstant("controllerLangKey") ? $rc->getConstant("controllerLangKey") : $controller->getKey());

                    $actions = array();
                    foreach($rc->getMethods() as $method){
                        $method = $method->getName();
                        if (strstr($method, "Action") !== false) {
                            $action = new Model_Action($controller);
                            $action->setEditAble(($rc->hasConstant($method . "EditAble") && $rc->getConstant($method . 'EditAble') == false) ? FALSE : TRUE);
                            $action->setKey(substr($method,0,strpos($method,"Action")));
                            $action->setLangKey(($rc->hasConstant($method . "LangKey")) ? $rc->getConstant($method . "LangKey"): $action->getKey());
                            $actions[] = $action;
                        }
                    }
                    $controller->setActions($actions);
                    break;
                }
            }

            $controllers[] = $controller;
        }

        return $controllers;
    }

    public function getControllerFiles($moduleDir, $file){
        $controllerFiles = array();
        if (is_dir($moduleDir . DS . $file)){
            foreach(array_diff(scandir($moduleDir . DS . $file), array('.','..')) as $childFile)
            {
                foreach ($this->getControllerFiles($moduleDir . DS . $file, $childFile) as $cf){
                    $controllerFiles[] = $cf;
                }
            }
        } elseif (is_file($moduleDir . DS . $file)) {
            // This is a file
            if (strstr($file, "Controller.php") !== false) {
                $controllerFiles[] = $moduleDir . DS . $file;
            }
        }
        return $controllerFiles;
    }

    /**
     * Format module name
     *
     * @var string $name
     * @return string
     */
    protected function formatModuleName($name)
    {
        $name = strtolower($name);
        $name = str_replace('.', ' ', $name);
        $name = str_replace(' ', '', $name);

        return $name;
    }

    public function getActionName(){
        $rc = new ReflectionClass($this->formatToControllerClass());
        return $rc->getConstant(Zend_Controller_Front::getInstance()->getRequest()->getActionName() . "ActionLangKey");
    }

    private function formatToControllerClass(){
        $front = Zend_Controller_Front::getInstance();
        $request = $front->getRequest();
        $module     = ucwords(preg_replace_callback("/_[a-z]?/", array('self', 'usToCc'), $request->getModuleName()));
        $controller = ucwords(preg_replace_callback("/_[a-z]?/", array('self', 'usToCc'), $request->getControllerName()));

        return ltrim($module . '_' . $controller . 'Controller', 'Default_');
    }

    /**
     * Format moduleDir to work at both windows and linux
     *
     * @var string $moduleDir
     * @return string
     */
    protected function formatModuleDir($moduleDir)
    {
        return str_replace(array("\\", "/"), DS, $moduleDir);
    }

    function usToCc($matches) {
        return "_". strtoupper(ltrim($matches[0], "_"));
    }
}