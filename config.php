<?php 
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    include_once ('./database/database.php');
    $db = new DBClass();


    require_once('./database/queries.php');
?>