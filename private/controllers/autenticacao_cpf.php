<?php

include("../model/Database.php");
if($_SESSION['user']['tipo']!= 1){
    header('Location: ../user.view.php');
    exit();
}