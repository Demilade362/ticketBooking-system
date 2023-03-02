<?php

$serverName = 'localhost';
$dbAccount = 'wytemecurycom_demilade';
$dbPassword = 'kaffy100KA';
$dbName = 'wytemecurycom_wetic';

$conn = mysqli_connect($serverName, $dbAccount, $dbPassword, $dbName);
if(!$conn){
    die('Connection Error' . mysqli_connect_error());
}