<?php
/**
 * Ean Daus
 * 2/11/2019
 * index.php
 * snow day PDO activity
 */
//php error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Connect to DB
require '/home/edausgre/config.php';

try{
    //instantiate a new database object
    $dbh = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
    echo 'Connected to Database!';

}catch(PDOException $e) {
    echo $e->getMessage();
}

//Define the query
$sql = "UPDATE pets SET name = :new
        WHERE name = :old";

//Prepare the statement
$statement = $dbh->prepare($sql);

//Bind the params
$old = 'Joey';
$new = 'Troy';
$statement->bindParam(':old', $old, PDO::PARAM_STR);
$statement->bindParam(':new', $new, PDO::PARAM_STR);

//Execute
$statement->execute();

/*
//Define the query
$sql = "INSERT INTO pets(type, name, color)
        VALUES (:type, :name, :color)";

//Prepare the statement
$statement = $dbh->prepare($sql);

//Bind the params
$type = 'kangaroo';
$name = 'Joey';
$color = 'purple';
$statement->bindParam(':type', $type, PDO::PARAM_STR);
$statement->bindParam(':name', $name, PDO::PARAM_STR);
$statement->bindParam(':color', $color, PDO::PARAM_STR);

//Execute
$statement->execute();
$id = $dbh->lastInsertId();
echo "<p>Pet $id inserted successfully.</p>";

//Bind the params
$type = 'snake';
$name = 'Slitherin';
$color = 'green';
$statement->bindParam(':type', $type, PDO::PARAM_STR);
$statement->bindParam(':name', $name, PDO::PARAM_STR);
$statement->bindParam(':color', $color, PDO::PARAM_STR);

//Execute
$statement->execute();
$id = $dbh->lastInsertId();
echo "<p>Pet $id inserted successfully.</p>";
*/