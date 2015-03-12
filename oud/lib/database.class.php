<?php

//include database constants
include_once 'config.inc.php';

class Database{

    private $mysqli;
    private $result;

    public function open_database()
    {
        //set glpbal variable scope
        global $connection;

        //Open database connection

        $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME)
            or die(mysqli_connect_errno());
    }

    public function execute_statement($statement)
    {
        //Get connection from global scope
        global $connection;

        //Open database connection
        open_database();

        //Execute database query
        $result = mysqli_query($connection, $statement)
            or die(mysqli_connect_errno());

        //Close database connection
        close_database();

        //Return results
        return $result;
    }

    public function close_database()
    {
        //Set global variable scope
        global $connection;

        //Close database connection
        if(isset($connection))
        {
            mysqli_close($connection);
        }
    }
}
