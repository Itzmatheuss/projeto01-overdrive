<?php
session_start();
include_once("../model/Database.php");
if($_SESSION['tipo']!=1){
    header('Location: ../views/user.view.php');
    exit();
}

