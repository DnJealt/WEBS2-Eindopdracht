<?php

/**
 * @author Mark van Kleef (mkleef@avans.nl)
 * @copyright Copyright (c) 2015, Avans Hogeschool - All rights reserved
 * @version 1.0.0
 */

class Page_Model_Mapper_Page extends Avans_Model_Mapper_Abstract implements Page_Model_Interface_Page
{
	/**
	 * @see Avans_Model_Mapper_Abstract::$_name
	 * @var string
	 */
	protected $_name = 'page';
	
	/**
	 * @see Page_Model_Interface_Page::persist()
	 * @param Page_Model_Page $page
	 * @return Page_Model_Page
	 */
	public function persist(Page_Model_Page $page)
	{
		$data = array(
			'title'		=> $page->getName(),
			'slug'		=> $page->getSlug(),
			'context' 	=> $page->getContent(),
			'category'	=> $page->getColumn(),
			'status' 	=> $page->getStatus()
		);
		
		$db = $this->getAdapter();
		if($page->getId() > 0)
		{
			$db->update($this->getTableName(), $data,
				$db->quoteInto('id = ?', $page->getId())
			);
		}
		else
		{
			$db->insert($this->getTableName(), $data);
			
			$page->setId($db->lastInsertId());
		}
		
		return $page;
	}
	
	/**
	 * @see Page_Model_Interface_Page::delete()
	 * @param Page_Model_Page $page
	 * @return void
	 */
	public function delete(Page_Model_Page $page)
	{
		$db = $this->getAdapter();
			
		$db->delete($this->getTableName(),
			$db->quoteInto('id = ?', $page->getId())
		);
	}
	
	/**
	 * @see Page_Model_Interface_Page::fetchById()
	 * @param int $id
	 * @return Page_Model_Page
	 */
	public function fetchById($id)
	{
		$db = $this->getAdapter();
			
		$row = $db->fetchRow($db->select()->from($this->getTableName())
			->where($db->quoteInto('id = ?', $id))
		);
		
		if($row !== false)
		{
			return $this->_createPage($row);
		}
		
		return array();
	}
	
	/**
	 * @see Page_Model_Interface_Page::fetchAll()
	 * @param array $options
	 * @return Page_Model_Page 
	 */
	public function fetchAll(array $options = array())
	{
		$db = $this->getAdapter();
		
		$select = $db->select()->from($this->getTableName());
		
		if(isset($options['limit'], $options['offset']))
		{
			$select->limit($options['limit'], $options['offset']);	
		}
		
		if(isset($options['order']))
		{
			$select->order($options['order']);
		}
		
		$rows = $db->fetchAll($select);
		
		if($rows !== false)
		{
			return $this->_createPages($rows);
		}
		
		return array();
	}
	
	/**
	 * @see Page_Model_Interface_Page::fetchBySlug()
	 * @param string $slug
	 * @return Page_Model_Page
	 */
	public function fetchBySlug($slug)
	{
		$db = $this->getAdapter();
		
		$row = $db->fetchRow($db->select()
			->from($this->getTableName())
			->where($db->quoteInto('slug = ?', $slug))
		);
		
		if($row !== false)
		{
			return $this->_createPage($row);
		}
		
		return array();
	}
	
	/**
	 * Fetch pages by column
	 * 
	 * @param int $column
	 * @return Page_Model_Page
	 */
	public function fetchByColumn($column)
	{
		$db = $this->getAdapter();
		
		$rows = $db->fetchAll($db->select()
			->from($this->getTableName(), array('id', 'title', 'slug'))
			->where($db->quoteInto('category = ?', $column))
			->where('status = 1')
		);
		
		if($rows !== false)
		{
			return $this->_createPages($rows);
		}
		
		return array();
	}
	
	/**
	 * Create pages from an array
	 * 
	 * @param array $rows
	 * @return array
	 */
	protected function _createPages(array $rows)
	{
		$pages = array();
		foreach($rows as $row)
		{
			$pages[] = $this->_createPage($row);
		}
		
		return $pages;
	}
	
	/**
	 * Create an page from an row
	 * 
	 * @param array $row
	 * @return Page_Model_Page
	 */
	protected function _createPage(array $row)
	{
		return new Page_Model_Page(array(
			'id'		=> (isset($row['id'])) ? $row['id'] : 0,
			'name'		=> (isset($row['title'])) ? $row['title'] : '',
			'slug'		=> (isset($row['slug'])) ? $row['slug'] : '',
			'content'	=> (isset($row['context'])) ? $row['context'] : '',
			'column'	=> (isset($row['category'])) ? $row['category'] : '',
			'status'	=> (isset($row['status'])) ? $row['status'] : ''
		));
	}
}