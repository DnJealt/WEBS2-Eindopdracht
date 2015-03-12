<?php

/**
 * @author Mark van Kleef (mkleef@avans.nl)
 * @copyright Copyright (c) 2015, Avans Hogeschool - All rights reserved
 * @version 1.0.0
 */

class Avans_Application_Resource_Cachemanager extends Zend_Application_Resource_Cachemanager
{
    /**
     * DEFAULT_REGISTRY_KEY
     * 
     * @var string
     */
    const DEFAULT_REGISTRY_KEY = 'Cachemanager';
    
    /**
     * Retrieve Zend_Cache_Manager instance
     * 
     * @return Zend_Cache_Manager
     */
    public function getCacheManager()
    {
        if(Zend_Registry::isRegistered(self::DEFAULT_REGISTRY_KEY))
        {
            $this -> _manager = Zend_Registry::get(self::DEFAULT_REGISTRY_KEY);
        }
        else
        {
            $this -> _manager = new Zend_Cache_Manager();
        }
        
        $options = $this -> getOptions();
        foreach($options as $key => $value)
        {
            if($this -> _manager -> hasCacheTemplate($key))
            {
                $this -> _manager -> setTemplateOptions($key, $value);
            }
            else
            {
                $this -> _manager -> setCacheTemplate($key, $value);
            }
        }
        
        Zend_Registry::set(self::DEFAULT_REGISTRY_KEY, $this -> _manager);
        
        return $this -> _manager;
    }
}