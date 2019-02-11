<?php
/**
 * Ean Daus
 * 2/11/2019
 * index.php
 * snow day PDO activity
 */

//Connect to DB
require '/home/edausgre_grc/config.php';
try{
    //instantiate a new database object
    $dbh = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
    echo 'Connected to Database!';
}catch(PDOException $e) {
    echo $e->getMessage();
}