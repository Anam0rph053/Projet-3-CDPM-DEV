<?php

class Manager
{


    public function __construct()
    {
        $this->db = new PDO("mysql:host=localhost;dbname=Projet-3;charset=utf8", "root", "root");
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        $this->db->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES "UTF8"');
    }
}
