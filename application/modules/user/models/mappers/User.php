<?php

/**
 * @author Mark van Kleef (mkleef@avans.nl)
 * @copyright Copyright (c) 2015, Avans Hogeschool - All rights reserved
 * @version 1.0.0
 */

class User_Model_Mapper_User extends Avans_Model_Mapper_Abstract implements User_Model_Interface_User
{
	/**
	 * @see Avans_Model_Mapper_Abstract::$_name
	 * @var string
	 */
	protected $_name = 'user';
	
	/**
	 * @see User_Model_Interface_User::persist()
	 * @param User_Model_User $user
	 * @return User_Model_User
	 */
	public function persist(User_Model_User $user)
	{
		$data = array(
			'roleId'		=> $user->getRoleId(),
			'userName'		=> $user->getUsername(),
			'userEmail'		=> $user->getEmail(),
			'userStatus'	=> $user->getStatus(),
			'userColor'		=> $user->getColor()
		);
		
		if($user->getPassword() != '')
		{
			$data['userPassword'] = $user->getPassword();
		}
		
		$db = $this->getAdapter();
		if($user->getId() > 0)
		{
			$db->update($this->getTableName(), $data,
				$db->quoteInto('id = ?', $user->getId())
			);	
		}
		else
		{
			$db->insert($this->getTableName(), $data);
		}
		
		return $user;
	}
	
	/**
	 * @see User_Model_Interface_User::delete()
	 * @param User_Model_User $user
	 * @return void
	 */
	public function delete(User_Model_User $user)
	{
		if(!array_key_exists($user->getId(), $user->getReadOnly()))
		{
			$db = $this->getAdapter();
		
			$db->delete($this->getTableName(),
				$db->quoteInto('id = ?', $user->getId())
			);	
		}
	}
	
	/**
	 * @see User_Model_Interface_User::fetchById()
	 * @param int $id
	 * @return User_Model_User 
	 */
	public function fetchById($id)
	{
		$db = $this->getAdapter();
		
		$select = $db->select()->from($this->getTableName())
			->where($db->quoteInto('id = ?', $id));
		
		$row = $db->fetchRow($select);
		
		if($row !== false)
		{
			return $this->_createUser($row);
		}
		
		return array();
	}
	
	/**
	 * @see User_Model_Interface_User::fetchAll()
	 * @param array $options
	 * @return User_Model_User
	 */
	public function fetchAll(array $options = array())
	{
		$db = $this->getAdapter();
		
		$select = $db->select()-> from($this->getTableName());
		
		$rows = $db->fetchAll($select);
		
		if($rows !== false)
		{
			return $this->_createUsers($rows);
		}
		
		return array();
	}
	
	/**
	 * Create users from an array
	 * 
	 * @param array $rows
	 * @return array
	 */
	protected function _createUsers(array $rows)
	{
		$users = array();
		foreach($rows as $row)
		{
			$users[] = $this->_createUser($row);
		}
		
		return $users;
	}
	
	/**
	 * Create a user from a row
	 * 
	 * @param array $row
	 * @return User_Model_User
	 */
	protected function _createUser(array $row)
	{
		return new User_Model_User(array(
			'id'		=> $row['id'],
			'roleId'	=> $row['role'],
			'username'	=> $row['username'],
			'password'	=> $row['password'],
			//'email'		=> $row['userEmail'],
			'status'	=> $row['active'],
			//'color'		=> $row['userColor']
		));
	}
}