<?php
class database{
    public static function connect(){
        $connection = new mysqli('mysql',"tutorial_user","secret_tutorial","tutorial_db");
        $connection->query("SET NAMES 'UTF8'");
        return $connection;
    }
}