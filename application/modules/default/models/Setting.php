<?php

/**
 * @author Mark van Kleef (mkleef@avans.nl)
 * @copyright Copyright (c) 2015, Avans Hogeschool - All rights reserved
 * @version 1.0.0
 */

class Model_Setting
{
	/**
	 * Get settting(s)
	 *
	 * @param string $key
	 * @return mixed
	 */
	public function getSettings($key = null)
	{
		if($key != null)
		{
			if(is_array($key))
			{
				if(count($key) == 1)
				{
					return $this->_getSetting(current($key));
				}
				
				$result = array();
				foreach($key as $setting)
				{
					$result[$setting] = $this->_getSetting($setting);
				}
				
				return $result;
			}
			elseif(is_string($key))
			{
				return $this->_getSetting($key);
			}
			
			return null;
		}
		
		return $this->_getSettings();
	}
	
	/**
	 * Update setting(s)
	 *
	 * @param array $settings
	 * @return void
	 */
	public function updateSettings(array $tab)
	{
		foreach($tab as $settings)
		{
			if(is_array($settings))
			{
				foreach($settings as $key => $value)
				{
					$this->_updateSetting($key, $value);
				}
			}
		}
	}
	
	/**
	 * Get one specified setting
	 *
	 * @param string $key
	 * @return string
	 */
	protected function _getSetting($key)
	{
		$settingMapper = new Model_Mapper_Setting();
		
		return $settingMapper->fetchByKey($key);
	}
	
	/**
	 * Get all settings
	 *
	 * @return array
	 */
	protected function _getSettings()
	{
		$settingMapper = new Model_Mapper_Setting();
		
		$result = array();
        foreach($settingMapper->fetchAll() as $setting)
        {
            $result[$setting['configKey']] = $setting['configValue'];   
        }
        
        return $result;
	}
	
	/**
	 * Update specified setting
	 *
	 * @param string $key
	 * @param string $value
	 * @return void
	 */
	protected function _updateSetting($key, $value)
	{
		if($this->_getSetting($key) !== null)
		{
			$settingMapper = new Model_Mapper_Setting();
			$settingMapper->updateSetting($key, $value);
		}
	}
}