<?php

define('DBNAME', 'projeto01-overdrive');
define('DBHOST', 'localhost');
define('DBUSER', 'root');
define('DBPASS', '');

$conn = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME) or die ('Não foi possível se conectar ao banco');