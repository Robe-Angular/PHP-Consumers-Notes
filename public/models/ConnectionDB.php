<?php
require_once 'config/database.php';
class ConnectionDB{
    public $db;
    public function __construct(){
        $this->db = database::connect();
    }
}
