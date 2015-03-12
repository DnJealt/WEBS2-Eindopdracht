<?php

/**
 * @author Mark van Kleef (mkleef@avans.nl)
 * @copyright Copyright (c) 2015, Avans Hogeschool - All rights reserved
 * @version 1.0.0
 */

class Avans_Filter_File_Resize implements Zend_Filter_Interface
{
	/**
	 * Vars
	 */
	protected $_width;
	protected $_height;
	protected $_directory = null;
	protected $_crop;
	protected $_watermark;
	protected $_adapter = 'Avans_Filter_File_Resize_Adapter_Imagick';
	
	/**
	 * Connstructor
	 * 
	 * @param array $options
	 * @return void
	 */
	public function __construct($options = array())
	{
		if($options instanceof Zend_Config)
		{
            $options = $options->toArray();
        }
        elseif(!is_array($options))
        {
            throw new Avans_Filter_Exception('Invalid options argument provided to filter');
        }
        
        $this->setOptions($options);
	}
	
	/**
	 * Set options
	 * 
	 * @param array $options
	 * @return void
	 */
	public function setOptions($options)
	{
		foreach($options as $key => $value)
		{
			$method = 'set' . ucfirst($key);
			if(method_exists($this, $method))
			{
				$this->$method($value);
			}
		}
	}
	
	/**
	 * Set width
	 * 
	 * @param int $width
	 * @return $this
	 */
	public function setWidth($width)
	{
		$this->_width = $width;
		return $this;
	}
	
	/**
	 * Get width
	 * 
	 * @return int
	 */
	public function getWidth()
	{
		return $this->_width;
	}
	
	/**
	 * Set height
	 * 
	 * @param int $height
	 * @return $this
	 */
	public function setHeight($height)
	{
		$this->_height = $height;
		return $this;
	}
	
	/**
	 * Get height
	 * 
	 * @return int
	 */
	public function getHeight()
	{
		return $this->_height;
	}
	
	/**
	 * Set directory
	 * 
	 * @param string $directory
	 * @return $this
	 */
	public function setDirectory($directory)
	{
		$this->_directory = $directory;
		return $this;
	}
	
	/**
	 * Get directory
	 * 
	 * @return string
	 */
	public function getDirectory()
	{
		return $this->_directory;
	}
	
	/**
	 * Set crop
	 * 
	 * @param bool $crop
	 * @return $this
	 */
	public function setCrop($crop = false)
	{
		$this->_crop = $crop;
		return $this;
	}
	
	/**
	 * Get crop
	 * 
	 * @return bool
	 */
	public function getCrop()
	{
		return $this->_crop;
	}
	
	/**
	 * Set watermark
	 * 
	 * @param array $watermark
	 * @return this
	 */
	public function setWatermark($watermark)
	{
		$this->_watermark = $watermark;
		return $this;
	}
	
	/**
	 * Get watermark
	 * 
	 * @return array
	 */
	public function getWatermark()
	{
		return $this->_watermark;
	}
	
	/**
	 * Set adapter
	 * 
	 * @param Avans_Filter_File_Resize_Adapter_Abstract $adapter
	 * @return Avans_Filter_File_Resize_Adapter_Abstract
	 */
	public function setAdapter($adapter)
	{
		if(!$adapter instanceof Avans_Filter_File_Resize_Adapter_Abstract)
		{
			if(substr($adapter, 0, 35) != 'Avans_Filter_File_Resize_Adapter_')
			{
				$adapter = 'Avans_Filter_File_Resize_Adapter_' . ucfirst(strtolower($adapter));
				$this->_adapter = new $adapter();
			}
		}
		
		$this->_adapter = $adapter;
	}
	
	/**
	 * Get adapter
	 * 
	 * @return Avans_Filter_File_Resize_Adapter_Abstract
	 */
	public function getAdapter()
	{
		if(!$this->_adapter instanceof Avans_Filter_File_Resize_Adapter_Abstract)
		{
			return new $this->_adapter();
		}
		
		return $this->_adapter;
	}
	
	/**
	 * @see Zend_Filter_Interface::filter()
	 * @param string $value
	 * @return string
	 */
	public function filter($value)
	{
		$target = $value;
		if($this->getDirectory())
		{
            $target = $this->getDirectory() . '/' . basename($value);
        }
        
        return $this->getAdapter()->resize(array(
        	'width'		=> $this->getWidth(),
        	'height'	=> $this->getHeight(),
        	'file'		=> $value,
        	'target'	=> $target,
        	'crop'		=> $this->getCrop(),
        	'watermark'	=> $this->getWatermark()
        ));
	}
}