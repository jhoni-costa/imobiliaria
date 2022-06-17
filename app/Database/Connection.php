<?php

class Connection{
    private $hostname;
    private $username;
    private $password;
    private $dbname;

    private $con;

    function __construct(){
        $this->hostname = 'localhost';
        $this->username = 'root';
        $this->password = '';
        $this->dbname = 'imobiliaria';

        $this->con = mysqli_connect($this->hostname, $this->username, $this->password, $this->dbname);
        if(!$this->con){
            die("Connection failed: " . mysqli_connect_error());
        }

    }

    public function getCon(){
        return $this->con;
    }

}