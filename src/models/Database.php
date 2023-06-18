<?php

class Database {
    private $host = 'db';
    private $username = 'root';
    private $password = 'root';
    private $database = 'interview-challenge';
 
    protected $connection;

    public function __construct(){
        if (!isset($this->connection)) {
            $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);
            if (!$this->connection) {
                echo 'Database Connection Failed.';
                exit;
            }            
        }    
 
        return $this->connection;
    }
}