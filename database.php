<?php
/*
 *   Created by: A.J.N.M. Jaliyagoda
 *   Update: 2016-11-28
 */

define("DB_HOST", "localhost");
define("DB_DATABASE", "databaseName");

define("DB_USER", "databaseUser");
define("DB_PASS", "databasePassword");

class database
{
    private $mysqli;

    function __construct()
    {
        $this->mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);

        if ($this->mysqli->connect_error) {
            die("Connection failed: " . $this->mysqli->connect_error);
        }
    }

    function __destruct()
    {
        $this->mysqli->close();
    }


}