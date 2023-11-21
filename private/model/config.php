<?php

define('DBNAME', 'projeto01-overdrive');
define('DBHOST', 'localhost');
define('DBUSER', 'root');
define('DBPASS', '');

$conn = new PDO('mysql:host='.DBHOST.';dbname='.DBNAME,DBUSER,DBPASS);

