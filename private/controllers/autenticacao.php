<?php
session_start();
include_once("../model/Database.php");
if(!$_SESSION['user']){
    header('Location:' .ROOT.'/public/index.php');
    exit();
}
