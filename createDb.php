<?php

class CreateDb
{
        public $password;
        public $db;
        public $table;
        public $con;
        public $server;
        public $user;

    public function __construct($db,$table,$password="",$user="root",$server="127.0.0.1")
    {
      $this->db = $db;
      $this->table = $table;
      $this->password = $password;
      $this->server = $server;
      $this->user = $user;
    }

    public function create($db,$table)
    {
        try{
            $db_pdo=new PDO('mysql:host=127.0.0.1','root','');
            $db_pdo->exec("CREATE DATABASE IF NOT EXISTS $db");
            $db_pdo1=new PDO("mysql:dbname=$db;host=127.0.0.1", "root", "" );
           
            $db_pdo1->exec("CREATE TABLE IF NOT EXISTS $table
                                (
                                 email VARCHAR (50) NOT NULL UNIQUE,
                                 pas VARCHAR (15) NOT NULL
                                );");
         
        }
       catch(PDOException $e)
            {
                return;
            }
    }
    public function connect($db)
    {
        try{
            return new PDO("mysql:dbname=$db;host=127.0.0.1", "root", "" );
        }
        catch(PDOException $e)
        {
            return;
        }
    }
   
}
                            
