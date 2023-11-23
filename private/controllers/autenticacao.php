<?php
session_start();
include("../model/Database.php");
if(!$_SESSION['user']){
    header('Location:' .ROOT.'/public/index.php');
    exit();
}