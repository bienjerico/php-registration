<?php

class Database {
    
    public $db;
    public $host = 'localhost';
    public $username = 'root';
    public $password = '';
    public $database = 'vmoneydb';
    
    
    public function __construct(){
        $this->_connection();
    }
    
    public function _connection(){
        return $this->db = mysqli_connect($this->host, $this->username, $this->password, $this->database) or die ('no connection');
    }
    
}

