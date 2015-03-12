<?php

/**
 * @author Mark van Kleef (mkleef@avans.nl)
 * @copyright Copyright (c) 2015, Avans Hogeschool - All rights reserved
 * @version 1.0.0
 */

require_once LIBRARY_PATH . '/HtmlPurifier/HTMLPurifier.auto.php';

class Avans_View_Helper_HtmlPurifier extends Zend_View_Helper_Abstract
{
	/**
	 * Html Purifier
	 * 
	 * @param string $value
	 * @param array $options
	 * @return string
	 */
	public function htmlPurifier($value, $options = null)
	{
		$config = $this->setOptions($options);
		
		$htmlPurifier = new HTMLPurifier($config);
		
		return $htmlPurifier->purify($value);
	}
	
	/**
	 * Set options
	 * 
	 * @param array $options
	 * @return HTMLPurifier_Config
	 */
	public function setOptions($options = null)
	{
		$purifierCacheDir = BASE_PATH . '/data/cache/htmlpurifier';
		
		$systemDir = new Avans_Filesystem_Dir();
		$systemDir->createDir($purifierCacheDir, 0755, true);
		
		$config = HTMLPurifier_Config::createDefault();
		$config->set('Core.Encoding', 'UTF-8');
		$config->set('HTML.DefinitionID', 'MyFilter');
		$config->set('HTML.DefinitionRev', 1); // Increment when configuration changes
		//$config->set('Cache.DefinitionImpl', null); // Comment out after finalizing the config
		$config->set('HTML.Doctype', 'XHTML 1.0 Transitional'); //(string) $this->view->doctype()
		$config->set('Cache.SerializerPath', $purifierCacheDir);
		$config->set('Filter.Custom', array(new Avans_View_Helper_HtmlPurifier_YoutubeIframe()));

		if(!is_null($options))
		{
			foreach($options as $option)
			{
				$config->set($option['key'], $option['value']);
			}
		}
		
		return $config;
	}
}