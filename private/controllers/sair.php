<?php
include("../model/Database.php");
session_start();
unset($_SESSION['user']);
header('Location:' .ROOT.'/public/index.php');
exit();
