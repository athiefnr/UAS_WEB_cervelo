<?php

$server = "localhost";
$username = "root";
$passowrd = "";
$db_name = "paweb";

$db = new mysqli($server, $username, $passowrd, $db_name);
if(!$db){
    die();
}

?>