<?php
/**
 * User Model
 */
class users extends Model
{
    protected static $tableName = users;
    protected static $primaryKey = 'userid';

    const PRIV_ADMINISTRATOR = 1;   //admin
    const PRIV_MODERATOR= 2;
    const PRIV_EDITOR= 3;
    const PRIV_MEMBER= 8;           //logged in customer
    const PRIV_GUEST= 99;           //non-logged in customer


    function setId($value){
        $this->setColumnValue('userid', $value);
    }
    function getId(){
        return $this->getColumnValue('userid');
    }
    //....//
    function setEmail($value){
        $this->setColumnValue('email', $value);
    }
    function getEmail(){
        return $this->getColumnValue('email');
    }
    //....//
    function setPassword($value){
        $this->setColumnValue('password', $value);
    }
    function getPassword(){
        return $this->getColumnValue('password');
    }
    //....//
    function setFirstname($value){
        $this->setColumnValue('firstname', $value);
    }
    function getFirstname(){
        return $this->getColumnValue('firstname');
    }
    //....//
    function setLastname($value){
        $this->setColumnValue('lastname', $value);
    }
    function getLastname(){
        return $this->getColumnValue('lastname');
    }
    //....//
    function setPhonenumber($value){
        $this->setColumnValue('phonenumber', $value);
    }
    function getPhonenumber(){
        return $this->getColumnValue('phonenumber');
    }
    //....//
    function setAddress($value){
        $this->setColumnValue('address', $value);
    }
    function getAddress(){
        return $this->getColumnValue('address');
    }
    //....//
    function setPostalcode($value){
        $this->setColumnValue('postalcode', $value);
    }
    function getPostalcode(){
        return $this->getColumnValue('postalcode');
    }
    //....//
    function setRole($value){
        $this->setColumnValue('role', $value);
    }
    function getRole(){
        return $this->getColumnValue('role');
    }
}
?>