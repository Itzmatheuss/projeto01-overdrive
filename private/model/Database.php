<?php

Trait Database{

    private function connect(){
        $string = "mysql:hostname=".DBHOST.";dbname=".DBNAME;
        $conn = new PDO($string,DBUSER,DBPASS);
        return $conn;
    }
    
}