<?php

class Connection{
    private $hostname;
    private $username;
    private $password;
    private $dbname;

    protected $con;

    function __construct(){
        $this->hostname = 'localhost';
        $this->username = 'root';
        if($_SERVER['SystemRoot'] == "C:\WINDOWS"){
            $this->password = '';
        }else{
            $this->password = 'Senha@123';
        }
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