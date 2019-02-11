<?php
/**
 * Ean Daus
 * 2/11/2019
 * index.php
 * snow day PDO activity
 */

//Connect to DB

$username = 'edausgre_grcuser';
$password = '@Eandaus123';
$hostname = 'localhost';
$database = 'edausgre_grc';

try{
    //instantiate a new database object
    $dbh = new PDO("mysql:dbname=edausgre_grc", $username, $password);
    echo 'Connected to Database!';
}catch(PDOException $e) {
    echo $e->getMessage();
}