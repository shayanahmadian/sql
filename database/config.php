<?php 
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    include_once ('./database.php');
    $db = new DBClass();


    require_once('./queries.php');
?>