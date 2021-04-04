<?php

class BookDao
{
    private $connection;

    public function __construct()
    {
        $this->connection = new mysqli("localhost", "root", "", "mysql");
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    function getData()
    {
        return $this->connection->query("SELECT * FROM `books`");
    }
}