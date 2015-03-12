<?php

class Database{

    private $mysqli;
    private $result;

    //include database constants
    //include_once 'config.inc.php'

    public function Database($database)
    {
       $this->mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if(mysqli_connect_errno()){
            printf("Connection failed %s\n", mysqli_connect_errno());
            exit();
        }
    }

    public function doSQL($sql){
         $this->result = $this->mysqli->query($input_query)
             or die($this->mysqli->error.__LINE__);
    }

    public function readRecord()
    {
        return $this->result->fetch_assoc();

    }
}
