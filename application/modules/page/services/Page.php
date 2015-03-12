<?php

/**
 * @author Mark van Kleef (mkleef@avans.nl)
 * @copyright Copyright (c) 2015, Avans Hogeschool - All rights reserved
 * @version 1.0.0
 */

class Page_Service_Page extends Avans_Service_Abstract
{
	/**
	 * Constructor
	 * 
	 * @param Page_Model_Interface_Page $mapper
	 * @return void
	 */
	public function __construct(Page_Model_Interface_Page $mapper)
	{
		$this->setMapper($mapper);
	}
	
	/**
	 * @see Page_Model_Interface_Page::persist()
	 * @param array $values
	 * @return void
	 */
	public function persist(array $values)
	{
		$page = new Page_Model_Page(array(
			'id'		=> (isset($values['id'])) ? $values['id'] : 0,
			'name'		=> $values['name'],
			'slug'		=> $values['name'],
			'content'	=> $values['content'],
			'column'	=> $values['column'],
			'status'	=> $values['status']
		));
		
		$this->getMapper()->persist($page);
	}
	
	/**
	 * @see Page_Model_Interface_Page::delete()
	 * @param int $id
	 * @return bool
	 */
	public function delete($id)
	{
		$page = $this->getMapper()->fetchById($id);
		
		if($page !== null)
		{
			$this->getMapper()->delete($page);
			
			return true;
		}
		
		return false;
	}
	
	/**
	 * @see Page_Model_Interface_Page::fetchById()
	 * @param int $id
	 * @return Page_Model_Page
	 */
	public function fetchById($id)
	{
		return $this->getMapper()->fetchById($id);
	}
	
	/**
	 * @see Page_Model_Interface_Page::fetchAl()
	 * @param array $options
	 * @return Page_Model_Page
	 */
	public function fetchAll(array $options = array())
	{
		return $this->getMapper()->fetchAll($options);
	}
	
	/**
	 * @see Page_Model_Interface_Page::fetchBySlug()
	 * @param string $slug
	 * @return Page_Model_Page
	 */
	public function fetchBySlug($slug)
	{
		return $this->getMapper()->fetchBySlug($slug);
	}
	
	/**
	 * @see Page_Model_Mapper_Page::fetchByColumn
	 * @param int $column
	 * @return Page_Model_Page
	 */
	public function fetchByColumn($column)
	{
		return $this->getMapper()->fetchByColumn($column);
	}
	
	/**
	 * Get form
	 * 
	 * @return Page_Form_Page
	 */
	public function getForm()
	{
		if($this->_form === null)
		{
			$this->_form = new Page_Form_Page();
		}
		
		return $this->_form;
	}
}