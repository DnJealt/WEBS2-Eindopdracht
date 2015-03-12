<?php

/**
 * @author Mark van Kleef (mkleef@avans.nl)
 * @copyright Copyright (c) 2015, Avans Hogeschool - All rights reserved
 * @version 1.0.0
 */

class Page_Model_Page extends Avans_Model_Abstract
{
	/**
	 * Vars
	 */
	protected $_id;
	protected $_name;
	protected $_slug;
	protected $_content;
	protected $_status;
	protected $_column;
	protected $_url;
	
	/**
	 * Set id
	 * 
	 * @param int $id
	 * @return this
	 */
	public function setId($id)
	{
		$this->_id = $id;
		return $this;
	}
	
	/**
	 * Get id
	 * 
	 * @return int
	 */
	public function getId()
	{
		return $this->_id;
	}
	
	/**
	 * Set name
	 * 
	 * @param string $name
	 * @return this
	 */
	public function setName($name)
	{
		$this->_name = $name;
		return $this;
	}
	
	/**
	 * Get name
	 * 
	 * @return string
	 */
	public function getName()
	{
		return $this->_name;
	}
	
	/**
	 * Set slug
	 * 
	 * @param string $name
	 * @return this
	 */
	public function setSlug($name)
	{
		$slugFilter = new Avans_Filter_Slug();
		
		$this->_slug = $slugFilter->filter($name);
		return $this;
	}
	
	/**
	 * Get slug
	 * 
	 * @return string
	 */
	public function getSlug()
	{
		if($this->_slug == '')
		{
			$this->setSlug($this->getName());
		}
		
		return $this->_slug;
	}
	
	/**
	 * Set content
	 * 
	 * @param string $content
	 * @return this
	 */
	public function setContent($content)
	{
		$this->_content = $content;
		return $this;
	}
	
	/**
	 * Get content
	 * 
	 * @return string
	 */
	public function getContent()
	{
		return $this->_content;
	}
	
	/**
	 * Set status
	 * 
	 * @param int $status
	 * @return this
	 */
	public function setStatus($status)
	{
		$this->_status = $status;
		return $this;
	}
	
	/**
	 * Get status
	 * 
	 * @return int
	 */
	public function getStatus()
	{
		return $this->_status;
	}
	
	/**
	 * Set column
	 * 
	 * @param int $column
	 * @return this
	 */
	public function setColumn($column)
	{
		$this->_column = $column;
		return $this;
	}
	
	/**
	 * Get column
	 * 
	 * @return int
	 */
	public function getColumn()
	{
		return $this->_column;
	}
	
	/**
	 * Set url
	 * 
	 * @param string $url
	 * @return this
	 */
	public function setUrl($url)
	{
		$this->_url = $url;
		return $this;
	}
	
	/**
	 * Get url
	 * 
	 * @return string
	 */
	public function getUrl()
	{
		if($this->_url == '')
		{
			$urlHelper = new Zend_View_Helper_Url();
			
			$this->setUrl($urlHelper->url(array(
				'page' => $this->getSlug()
			), 'page-index-index'));
		}
		
		return $this->_url;
	}
}