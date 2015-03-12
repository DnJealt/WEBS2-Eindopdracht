<?php

/**
 * @author Mark van Kleef (mkleef@avans.nl)
 * @copyright Copyright (c) 2015, Avans Hogeschool - All rights reserved
 * @version 1.0.0
 */

class Avans_Model_Mapper_Cache
{
	/**
	 * Cache dir
	 * 
	 * @var string
	 */
	protected $_cacheDir;
	
	/**
	 * Set cache dir
	 * 
	 * @param string $cacheDir
	 * @return this
	 */
	public function setCacheDir($cacheDir)
	{
		$this->_cacheDir = $cacheDir;
		return $this;
	}
	
	/**
	 * Get cache dir
	 * 
	 * @return string
	 */
	public function getCacheDir()
	{
		return $this->_cacheDir;
	}
	
	/**
	 * Get cache
	 * 
	 * @return Zend_Cache
	 */
	public function getCache()
	{
		$cacheManager = Zend_Registry::get('Cachemanager');
		$cache = $cacheManager->getCache('default');
		
		$cacheDir = $this->getCacheDir();
		if($cacheDir != '')
		{
			$systemDir = new Avans_Filesystem_Dir();
			$systemDir->createDir($cacheDir, 0755, true);
		
			$cache->getBackend()->setCacheDir($cacheDir);
		}
		
		return $cache;
	}
	
	/**
	 * Load cache file
	 * 
	 * @param string $fileName
	 * @return mixed
	 */
	public function loadCacheFile($fileName)
	{
		$cache = $this->getCache();
		return $cache->load($fileName);
	}
	
	/**
	 * Save cache file
	 * 
	 * @param string $fileName
	 * @param mixed $content
	 * @param array $tags
	 * @return void
	 */
	public function saveCacheFile($fileName, $content, $tags = array())
	{
		$cache = $this->getCache();
		
		if(!$cache->test($fileName))
		{
			$cache->save($content, $fileName, $tags);
		}
	}
	
	/**
	 * Remove cache file
	 * 
	 * @param string $fileName
	 * @return void
	 */
	public function removeCacheFile($fileName)
	{
		$cache = $this->getCache();
		$cache->remove($fileName);
	}
	
	/**
	 * Clean cache by tags
	 * 
	 * @param array $tags
	 * @return void
	 */
	public function cleanCacheByTags(array $tags = array())
	{
		$cache = $this->getCache();
		$cache->clean(Zend_Cache::CLEANING_MODE_MATCHING_TAG, $tags);
	}
}