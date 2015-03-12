<?php

/**
 * @author Mark van Kleef (mkleef@avans.nl)
 * @copyright Copyright (c) 2015, Avans Hogeschool - All rights reserved
 * @version 1.0.0
 */

interface Page_Model_Interface_Page
{
	/**
	 * Persist page
	 * 
	 * @param Page_Model_Page $page
	 * @return Page_Model_Page
	 */
	public function persist(Page_Model_Page $page);
	
	/**
	 * Delete page
	 * 
	 * @param Page_Model_Page $page
	 * @return void
	 */
	public function delete(Page_Model_Page $page);
	
	/**
	 * Fetch page by id
	 * 
	 * @param int $id
	 * @return Page_Model_Page
	 */
	public function fetchById($id);
	
	/**
	 * Fetch all pages
	 * 
	 * @param array $options
	 * @return Page_Model_Page
	 */
	public function fetchAll(array $options = array());
	
	/**
	 * Fetch by slug
	 * 
	 * @param string $slug
	 * @return Page_Model_Page
	 */
	public function fetchBySlug($slug);
}