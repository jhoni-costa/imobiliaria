<?php

class Connection{
    private $hostname;
    private $username;
    private $password;
    private $dbname;

    private $con;

    function __construct($hostname, $username, $password = "", $dbname){
        $this->hostname = $hostname;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;

        $this->con = mysqli_connect($this->hostname, $this->username, $this->password, $this->dbname);
        if(!$this->con){
            die("Connection failed: " . mysqli_connect_error());
        }

    }

    public function getCon(){
        return $this->con;
    }

}